<?php
namespace App\Http\Services;
use App\Models\Exam;

class ExamService {
    public function storeService($validated){
        $newExam = Exam::create($validated);

        $users = $validated['user_id'];

        $newExam->users()->attach($users);
    }

    public function updateSerivce($exam, $validated) {
        $exam->update($validated);

        $user = $validated['user_id'];

        $exam->users()->sync($user);
    }

}

?>
