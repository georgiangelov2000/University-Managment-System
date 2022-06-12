@extends('layouts.app')


@section('content')
    <form method="post" action="{{route('user.update',$user->id)}}" class="card p-3" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 w-50">
            <img src="{{ asset('storage/users/'.$user->picture) }}" class="img-thumbnail w-25" alt="">
        </div>
        <div class="custom-file mb-3">
            <div class="custom-file mb-3">
                <input type="file" name="picture" id="customFile">
                <label class="custom-file-label" for="customFile">
                    {{$user->picture}}
                </label>
            </div>
        </div>        <div class="mb-3">
            <label for="" class="form-label">First Name</label>
            <input type="text" value="{{ $user->first_name }}" class="form-control form-control-sm" name="first_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Last Name</label>
            <input type="text" value="{{ $user->last_name }}" class="form-control form-control-sm" name="last_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" value="{{ $user->email }}" class="form-control form-control-sm" name="email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" value="{{ $user->password }}" class="form-control form-control-sm" name="password">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Age</label>
            <input type="age" value="{{ $user->age }}" class="form-control form-control-sm" name="age">
        </div>
        <div class="mb-3">
            <label class="form-label">Courses</label>
            <select class="form-control form-control-sm" name="course_id">
                @foreach ($courses as $item)
                    <option {{$user->course_id == $item->id ? ' selected' : ''}} value={{ $item->id }}>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Groups</label>
            <select name="role" class="form-control form-control-sm" value="{{$user->role}}">
                <option value="admin">Admin</option>
                <option value="student">Student</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>

    @push('scripts')
        <script type="text/javascript">
            var UPDATECOURSE = "{{route('course.update',':id')}}"
        </script>
    @endpush
@endsection
