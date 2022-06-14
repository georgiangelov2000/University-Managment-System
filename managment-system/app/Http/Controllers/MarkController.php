<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MarkController extends Controller
{

    public function index(){
        $users = User::all();
        $subjects =Subject::all();

        return View::make('marks.index',['subjects' =>$subjects, 'users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $users = User::all();

        return View::make('marks.create',['subjects' => $subjects],['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $validated = $request->validated();
        $mark = new Mark();
        foreach ($validated['subject_id'] as $key => $value) {
            $mark->create([
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'][$key],
                'mark' => $validated['mark'][$key],
                'date_of_mark' => $validated['date_of_mark'][$key],
            ]);
        }
        return redirect()->back()->with('success', 'Successfully created data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mark = $request->get('mark');
        Mark::find($mark)->delete();
    }
}
