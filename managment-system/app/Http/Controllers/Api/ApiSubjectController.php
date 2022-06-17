<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class ApiSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::query();

        $search = $request->get('search');
        $subjectFilter = $request->get('subject');
        $descriptionFilter = $request->get('description');

        if($search){
            $subjects->where(function ($q) use ($search)
            {
                $q->where('title', 'LIKE', $search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $search . '%')
                        ->orWhere('updated_at', 'LIKE', '%' . $search . '%');
            });
        }
        if($subjectFilter) {
            $subjects->where('id', $subjectFilter);
        }
        if($descriptionFilter) {
            $subjects->where(function ($q) use ($descriptionFilter)
            {
                $q->where('description', 'LIKE', $descriptionFilter . '%');
            });
        }

        $subjects = $subjects->get();

        return Datatables::of($subjects)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
