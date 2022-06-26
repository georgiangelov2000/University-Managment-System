@extends('layouts.app')


@section('content')
    <form method="post" action="{{ route('user.update', $user->id) }}" class="card p-3" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 w-50">
            <img src="{{ asset('storage/users/' . $user->picture) }}" class="img-thumbnail w-25" alt="">
        </div>
        <div class="custom-file mb-3">
            <div class="custom-file mb-3">
                <input type="file" name="picture" value="{{$user->picture}}" class="form-control form-control-sm" id="customFile">
                <label class="custom-file-label " for="customFile">{{$user->picture}}</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label ">First Name</label>
            <input type="text" value="{{ $user->first_name }}" class="form-control form-control-sm" name="first_name">
            @if ($errors->has('first_name'))
                <div class="error text-danger">{{ $errors->first('first_name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Last Name</label>
            <input type="text" value="{{ $user->last_name }}" class="form-control form-control-sm" name="last_name">
            @if ($errors->has('last_name'))
                <div class="error text-danger">{{ $errors->first('last_name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email address</label>
            <input type="email" value="{{ $user->email }}" class="form-control form-control-sm" name="email">
            @if ($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" value="{{ $user->password }}" class="form-control form-control-sm" name="password">
            @if ($errors->has('password'))
                <div class="error text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Groups</label>
            <select name="role" class="form-control form-control-sm" value="{{ $user->role }}">
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            @if ($errors->has('role'))
                <div class="error text-danger">{{ $errors->first('role') }}</div>
            @endif
        </div>
        <div class="col-md-12 form-group mb-0 pl-0">
            <div class="mb-1 d-flex flex-column">
                <div>
                    <label for="">Gender</label>
                </div>
                <div class="row pl-2">
                    <div class="form-check pr-1">
                        <input class="form-check-input" {{$user->gender == 'male' ? 'checked' : ''}} name="gender" value="male" type="checkbox">
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check pr-1">
                        <input class="form-check-input" {{$user->gender == 'famale' ? 'checked' : ''}} name="gender" value="famale" type="checkbox">
                        <label class="form-check-label">Famale</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="country">Country</label>
            <select name="country" id="" class="form-control form-control-sm  {{ $errors->has('country') ? 'is-invalid' : '' }}">
                @foreach ($countries as $country)
                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('country'))
                <div class="error text-danger">{{ $errors->first('country') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Age</label>
            <input type="age" value="{{ $user->age }}" class="form-control form-control-sm" name="age">
            @if ($errors->has('age'))
                <div class="error text-danger">{{ $errors->first('age') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Courses</label>
            <select class="form-control form-control-sm" name="course_id">
                @foreach ($courses as $item)
                    <option {{ $user->course_id == $item->id ? ' checked' : '' }} value={{ $item->id }}>
                        {{ $item->title }}</option>
                @endforeach
            </select>
            @if ($errors->has('course_id'))
                <div class="error text-danger">{{ $errors->first('course_id') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>

    @push('scripts')
        <script type="text/javascript">
            var UPDATECOURSE = "{{ route('course.update', ':id') }}"
        </script>
    @endpush
@endsection
