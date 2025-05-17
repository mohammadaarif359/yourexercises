<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{User, DoctorPlanAssign};
use App\Traits\AuthCode;
use DateTime;

class NotifyPatientPlanNotRegular extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:patient-plan-not-regular';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify to patient which is not regular do exercise form last 2 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    use AuthCode;
    public function handle()
    {
        $date = new DateTime(); // current date
        $date->modify('-2 days');
        $assignPlanUsers = DoctorPlanAssign::where('status','ongoing')
            ->whereHas('user', function($q) use($date) {
                return $q->where('last_login', '<', $date->format('y-m-d h:i:s'));
            })->get();

        \Log::info('corn patient not regular'. count($assignPlanUsers));
        foreach($assignPlanUsers as $assign) {
            try {
                \Log::info('crone loop' .$assign);
                $data['name'] = $assign->user['name'];
                $data['email'] = 'mohammedaarif359@gmail.com';
                $data['message'] = trans('sms.patient.plan.assign.not.regular', ['plan_name' => $assign['plan']['name'], 'doctor_name' => $assign['doctor_user']['name']]);
                $data['url'] = url('/clinic/'. $assign['doctor']['slug']);
                $this->sendPatientPlanAssignNotRegularEmail($data);
            } catch (\Exception $e) {
                \Log::error('Failed to send email to user ID: ' . $assign->user_id . '. for assign Id: ' . $assign->id. '. Error: ' . $e->getMessage());
                continue;
            }
        }
        return Command::SUCCESS;
    }
}
