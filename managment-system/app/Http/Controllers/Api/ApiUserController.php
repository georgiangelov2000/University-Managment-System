<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users =User::query();

        $search =$request->get('search');

        $course = $request->get('course');
        $age = $request->get('age');

        if($search){
            $users->where(function ($q) use ($search)
            {
                $q->where('first_name', 'LIKE', $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        if ($course) {
            $users->where('course_id','=',$course);
        }

        if($age) {
            $users->where(function ($q) use ($age)
            {
                $q->where('age', 'LIKE', $age . '%');
            });
        }

        $users = $users->get();

        $serializer = [];
        foreach ($users as $key => $value) {
           $serializer[] =  [
                'id' => $value->id ?? '',
                'picture' => asset('storage/users/'.$value->picture),
                'first_name' => $value->first_name ?? '',
                'last_name' => $value->last_name ?? '',
                'email' => $value->email ?? '',
                'age' => $value->age ?? '',
                'role' => $value->role ?? '',
                'course' => $value->courses->title ?? '',
                'created_at' => $value->created_at ?? '',
                'updated_at' => $value->updated_at ?? '',
            ];
        }
        return Datatables::of($serializer)->make(true);
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
