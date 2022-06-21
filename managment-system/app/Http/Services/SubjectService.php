<?php

namespace App\Http\Services;
use App\Models\Subject;

class SubjectService {
    public function storeService($validated){

       $newSubject = Subject::create($validated);

       $course = $validated['course_id'];

       $newSubject->courses()->attach($course);

    }

    public function updateService($subject, $validated){
        $subject->update($validated);

        $course = $validated['course_id'];

        $subject->courses()->sync($course);
    }

    public function detachService($subject,$validated){
        $detached  = $validated;

        foreach ($detached as  $value) {
            $subject->courses()->detach($value);
        }
    }
}

?>
