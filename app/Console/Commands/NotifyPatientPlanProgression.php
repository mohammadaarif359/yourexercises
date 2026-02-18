<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{DoctorPlan, PlanAssignFeedback};
use App\Traits\AuthCode;
use DateTime;
use Carbon\Carbon;

class NotifyPatientPlanProgression extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:patient-plan-progression';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify to patient increase the exercise attribute reps, hold accoding progession frequency';

    /**
     * Execute the console command.
     *
     * @return int
     */
    use AuthCode;
    public function handle()
    {
        \Log::info('crone plan progression start');
        $today = Carbon::now()->format('Y-m-d');
	    $plans = DoctorPlan::whereHas('doctor_plan_detail', function($q) use ($today) {
                    $q->where('next_date', $today);
                })->whereHas('plan_assign', function($q) {
                    $q->where('status', 'ongoing');
                })->with(['doctor_plan_detail' => function($q) use ($today) {
                    $q->where('next_date', $today);
                }])->get();
        
        foreach($plans as $k => $plan) {
            $is_update = false;
             try {
                \Log::info('crone plan progression' .$plan->id);
                foreach($plan['doctor_plan_detail'] as $detail) {
                    $rating_match = PlanAssignFeedback::Where('plan_id', $plan->id)->where('exercise_id', $detail->doctor_exercise_id)->where('rating', '>=', $detail->apply_rating)->first();
                    if($rating_match) {
                        $is_update = true;
                        $max_progession = config('custom.max_progession');
                        $reps = (int) $detail->reps + (($detail->reps * $detail->increase_per) / 100);
                        $hold = (int) $detail->hold + (($detail->hold * $detail->increase_per) / 100);
                        $complete = (int) $detail->complete + (($detail->complete * $detail->increase_per) / 100);
                        $perform = (int) $detail->perform + (($detail->perform * $detail->increase_per) / 100);
                        
                        $new_history = [
                            'date'     => $detail->next_date ? $detail->next_date : $detail->start_date,
                            'reps'     => $detail->reps,
                            'hold'     => $detail->hold,
                            'complete' => $detail->complete,
                            'perform'  => $detail->perform,
                        ];
                        
                        $progression_history = $detail->progression_history ?? [];
                        $progression_history[] = $new_history;
    
                        $prop_next_date = Carbon::today()->addDays($detail->progression_frequency);
                        $prop_end_date = Carbon::parse($detail->end_date)->startOfDay();
                        
                        $detail->reps     = min((int)ceil($reps), $max_progession['reps']);
                        $detail->hold     = min((int)ceil($hold), $max_progession['hold']);
                        $detail->complete = min((int)ceil($complete), $max_progession['complete']);
                        $detail->perform  = min((int)ceil($perform), $max_progession['perform']);
                        $detail->progression_history = $progression_history;
                        $detail->progression_last_update = $today;
                        
                        if ($prop_next_date->lessThanOrEqualTo($prop_end_date)) {
                            $detail->next_date = $prop_next_date->format('Y-m-d');
                            $detail->progression_status = 'in_progress';
                        } else {
                            $detail->progression_status = 'completed';
                        }
                        $detail->save();
                    }
                }
                // re-gengerate pdf
                if($is_update) {
                    $updated_plan = DoctorPlan::find($plan->id);
                    $this->createDoctorPlanPdf($updated_plan);
                    \Log::info('crone progression success' .$plan->id);
                }
             } catch (\Exception $e) {
                \Log::error('Failed to update plan porgesesion Plan Id: ' . $plan->id . '. Error: ' . $e->getMessage());
                continue;
            }
        }
        return Command::SUCCESS;
    }
}
