@extends('layouts.app')


@section('content')
    <form method="post" action="{{ route('user.store') }}" class="card p-3" enctype="multipart/form-data" >
      @csrf
        <div class="custom-file mb-3">
            <input type="file" name="picture" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">First name</label>
            <input type="text" class="form-control form-control-sm" name="first_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Last name</label>
            <input type="text" class="form-control form-control-sm" name="last_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email address</label>
            <input type="email" class="form-control form-control-sm" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-sm" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="text" class="form-control form-control-sm" name="age">
        </div>
        <div class="mb-3">
            <label class="form-label">Courses</label>
            <select class="form-control form-control-sm" name="course_id">
                @foreach ($courses as $item)
                    <option value={{ $item->id }}>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Groups</label>
            <select name="role" class="form-control form-control-sm">
                <option value="admin">Admin</option>
                <option value="student">Student</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
@endsection
