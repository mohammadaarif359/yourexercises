<?php namespace App\Traits;
use Auth;
use App\Models\{Exercise, ExerciseCategory, Attachment};

trait AdminExerciseCode {
    public function adminExerciseStore($doctorExercise) {
        $image = null;
        $adminExercise =  $doctorExercise;
        $adminExercise['is_private'] = 0;
        $adminExercise['doctor_exercise_id'] = $doctorExercise['id'];
        if ($doctorExercise['image']) {
            $adminExercise['image'] = $this->copyImg($doctorExercise->image, 'public/doctor/exercise', 'public/exercise');
		}
        $exercise = Exercise::create($doctorExercise->toArray());

        $this->adminExerciseCategorySave($doctorExercise['exercise_category'],$exercise->id);

        if($doctorExercise['attachments']) {
			$this->adminExerciseAttachmentSave($doctorExercise['attachments'], $exercise->id);
		}
        return true;
    }

    protected function adminExerciseCategorySave($categories, $exercise_id) {
		ExerciseCategory::where('exercise_id', $exercise_id)->delete();
        foreach($categories as $k=> $cat) {
            ExerciseCategory::create([
                'exercise_id' => $exercise_id,
                'category_id' => $cat->category_id,
                'subcategory_id' => $cat->subcategory_id
            ]);
        }
	}

    public function adminExerciseAttachmentSave($attachments, $exercise_id) {
		foreach($attachments as $k=> $attachment) {
			if($attachment->is_active === 1) {
				$image = $this->copyImg($attachment->image, 'public/doctor/exercise', 'public/exercise');
				$attachment = Attachment::updateOrCreate([
					'image' => $image,
					'path' => 'exercise',
					'attachable_id' => $exercise_id,
					'attachable_type' => 'App\Models\Exercise',
					'created_by' => Auth::user()->id,
				]);
			}
		}
	}
}

?>