@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('course.store.program', $course_id) }}" class="card p-3">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course_id }}">
        <div class="col">
            <div class="row mb-2 ml-2 ">
                <button type="button" class="btn btn-warning btn-sm mr-2 addField">Add Field</button>
                <button type="button" class="btn btn-danger btn-sm removeField">Remove Field</button>
            </div>
            <div class="programWrapper">
                <div class="form-group mb-0 d-flex programContent">
                    <div class="mb-3 col-md-2 ">
                        <label for="subject_id">Subjects</label>
                        <select name="subject_id[]" id="subject_id"
                            class="form-control form-control-sm {{ $errors->has('subject_id') ? 'is-invalid' : '' }}">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">
                                    {{ $subject->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('subject_id'))
                            <div class="error text-danger">{{ $errors->first('subject_id') }}</div>
                        @endif
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="">Date</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text"
                                class="datepicker form-control form-control-sm {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                placeholder="dd-mm-yy" name="date[]">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        @if ($errors->has('date'))
                            <div class="error text-danger">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="">Hour</label>
                        <div class="input-group date">
                            <input type="text"
                                class="datetime form-control form-control-sm {{ $errors->has('hour') ? 'is-invalid' : '' }}"
                                name="hour[]" placeholder="h:m">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        @if ($errors->has('hour'))
                            <div class="error text-danger">{{ $errors->first('hour') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 ml-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>

    @push('scripts')
        <script src="{{ mix('js/courses_managment/course_action.js') }}"></script>
    @endpush
@endsection
