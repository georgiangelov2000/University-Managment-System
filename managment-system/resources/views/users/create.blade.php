@extends('layouts.app')


@section('content')
    <form method="post" action="{{ route('user.store') }}" class="card p-3" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12 form-group mb-0">
                <label for="" class="form-label">Picture</label>
                <div class="custom-file mb-3">
                    <input type="file" name="picture" class="form-control form-control-sm" id="customFile">
                    <label class="custom-file-label " for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col-md-12 form-group mb-0">
                <div class="mb-1">
                    <label for="" class="form-label">First name</label>
                    <input type="text"
                        class="form-control form-control-sm {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                        name="first_name">
                    @if ($errors->has('first_name'))
                        <div class="error text-danger">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="mb-1">
                    <label for="" class="form-label">Last name</label>
                    <input type="text"
                        class="form-control form-control-sm {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                        name="last_name">
                    @if ($errors->has('last_name'))
                        <div class="error text-danger">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
                <div class="mb-1">
                    <label for="" class="form-label">Email address</label>
                    <input type="email"
                        class="form-control form-control-sm  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email">
                    @if ($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" name="password">
                </div>
            </div>
            <div class="col-md-12 form-group mb-0">
                <div class="mb-1">
                    <label class="form-label">Groups</label>
                    <select name="role"
                        class="form-control form-control-sm  {{ $errors->has('role') ? 'is-invalid' : '' }}">
                        <option value="">Select Group</option>
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
                                <input class="form-check-input" name="gender" value="male" type="checkbox">
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check pr-1">
                                <input class="form-check-input" name="gender" value="famale" type="checkbox">
                                <label class="form-check-label">Famale</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1">
                    <label for="country">Country</label>
                    <select name="country" id=""
                        class="form-control form-control-sm  {{ $errors->has('country') ? 'is-invalid' : '' }}">
                        <option value="">Select country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <div class="error text-danger">{{ $errors->first('country') }}</div>
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label">Age</label>
                    <input type="text" class="form-control form-control-sm {{ $errors->has('age') ? 'is-invalid' : '' }}"
                        name="age">
                    @if ($errors->has('age'))
                        <div class="error text-danger">{{ $errors->first('age') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 form-group mb-0">
                <div class="mb-1">
                    <label class="form-label">Courses</label>
                    <select class="form-control form-control-sm {{ $errors->has('course_id') ? 'is-invalid' : '' }}"
                        name="course_id">
                        <option value="">Select Course</option>
                        @foreach ($courses as $item)
                            <option value={{ $item->id }}>{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course_id'))
                        <div class="error text-danger">{{ $errors->first('course_id') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-1">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
@endsection
