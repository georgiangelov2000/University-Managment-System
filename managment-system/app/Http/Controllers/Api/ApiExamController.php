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

        $posts = Exam::with('subjects')->get();

        return Datatables::of($posts)->make(true);
    }

    public function users(Exam $exam){
        $students = $exam->users()->get();

        $serializer = $students->map(function($item, $key) {
            return [
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
                'age' => $item->age,
                'course' => $item->courses->title,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
         });


        return Datatables::of($serializer)->make(true);
    }


}
