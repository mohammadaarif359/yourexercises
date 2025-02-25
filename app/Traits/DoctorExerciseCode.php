<?php namespace App\Traits;
use Auth;
use App\Models\{DoctorExercise, DoctorExerciseCategory, Attachment};
use App\Models\{Subcategory, Exercise};

trait DoctorExerciseCode {
    public function exerciseStore($request_data) {
        $admnExerise = null;
		if($request_data['exercise_id']) {
			$admnExerise = Exercise::where('id', $request_data['exercise_id'])->with('attachments')->first();
		}
		$image = null;
		/*if ($request_data->hasFile('image')) {
			$image = $this->uploadImg($request->image, 'doctor/exercise');
		} else if($admnExerise['image']) {
			$image = $this->copyImg($admnExerise->image, 'public/exercise', 'public/doctor/exercise');
		}*/
		if($admnExerise && $admnExerise['image']) {
			$image = $this->copyImg($admnExerise->image, 'public/exercise', 'public/doctor/exercise');
		}
        $exercise = DoctorExercise::create([
            'exercise_id' => $request_data['exercise_id'] ?? null,
			'name' => $request_data['name'],
			'description' => $request_data['description'],
			'image' => $image,
			'reps' => $request_data['reps'] ?? null,
			'hold' => $request_data['hold'] ?? null,
			'complete' => $request_data['complete'] ?? null,
			'perform' => $request_data['perform'] ?? null,
			'frequency' => $request_data['frequency'] ?? null,
			'times' => $request_data['times'] ?? null,
			'is_active' => $request_data['is_active'] ?? false,
			'created_by' => Auth::user()->id,
		]);
        $this->exerciseCategorySave($request_data,$exercise->id);

        if($admnExerise && $admnExerise['attachments']) {
			$this->exerciseAttachmentSave($admnExerise['attachments'], $exercise->id);
		}
        return $exercise;
    }

    protected function exerciseCategorySave($request_data, $exercise_id) {
		DoctorExerciseCategory::where('doctor_exercise_id', $exercise_id)->delete();
		if (!empty($request_data['category_id']) && count($request_data['category_id']) > 0) {
			foreach ($request_data['category_id'] as $cat) {
				if (!empty($request_data['subcategory_id']) && count($request_data['subcategory_id']) > 0) {
					foreach ($request_data['subcategory_id'] as $subcat) {
						// Ensure subcategory belongs to the current category
						$subcategory = Subcategory::where('id', $subcat)
							->where('category_id', $cat)
							->first();
		
						if ($subcategory) {
							// Save a single row with the category and its subcategory
							DoctorExerciseCategory::create([
								'doctor_exercise_id' => $exercise_id,
								'category_id' => $cat,
								'subcategory_id' => $subcat
							]);
						}
					}
				}
			}
		}
	}

    public function exerciseAttachmentSave($attachments, $exercise_id) {
		foreach($attachments as $k=> $attachment) {
			if($attachment->is_active === 1) {
				$image = $this->copyImg($attachment->image, 'public/exercise', 'public/doctor/exercise');
				$attachment = Attachment::updateOrCreate([
					'image' => $image,
					'path' => 'doctor/exercise',
					'attachable_id' => $exercise_id,
					'attachable_type' => 'App\Models\DoctorExercise',
					'created_by' => Auth::user()->id,
				]);
			}
		}
	}
}

?>