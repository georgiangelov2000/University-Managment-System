<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ApiAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $arr =[];

        $user_id= $request->get('user_id');
        $subject_id = $request->get('subject_id');

        if($user_id && $subject_id ){
           $filteredAttendance = DB::table('users')
            ->join('attendances','users.id','attendances.user_id')
            ->where('attendances.user_id',$user_id)
            ->join('subjects','subjects.id','attendances.subject_id')
            ->where('attendances.subject_id',$subject_id)
            ->select('attendances.id','attendances.is_attendance','attendances.date_attendance')
            ->get()
            ->toArray();

            return Datatables::of($filteredAttendance)->make(true);
        }

        return Datatables::of($arr)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
