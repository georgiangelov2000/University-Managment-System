<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class ApiExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exams = Exam::with('subjects')->get();

        return Datatables::of($exams)->make(true);
    }

    public function users(Exam $exam){
        $students = $exam->users()->get();

        $serializer = $students->map(function($item, $key) {
            return [
                'id' => $item->id,
                'picture' => asset('storage/users/'.$item->picture),
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
                'age' => $item->age,
                'course' => $item->courses->title,
                'exam_is_taken' => $item->exam_is_taken,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
         });
        return Datatables::of($serializer)->make(true);
    }


}
