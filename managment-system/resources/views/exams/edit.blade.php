@extends('layouts.app')

@section('content')
    <form method="post" class="card p-3" action="{{ route('exam.update',$exam->id) }}">
        @csrf
        <div class="mb-3">
            <label for="">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control form-control-sm">
                <option value="">Select Subject</option>
                @foreach ($subjects as $item)
                    <option {{ in_array($item->id, $attachedSubjects) ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Exam Start</label>
            <div class="input-group date" id="datepicker">
                <input type="text" value="{{$exam->date_start_exam}}" class="form-control form-control-sm {{ $errors->has('date_start_exam') ? 'is-invalid' : '' }}" placeholder="dd-mm-yy" name="date_start_exam">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Exam End</label>
            <div class="input-group date" id="datepicker">
                <input type="text" value="{{$exam->date_end_exam}}" class="form-control form-control-sm {{ $errors->has('date_end_exam') ? 'is-invalid' : '' }}" placeholder="dd-mm-yy" name="date_start_exam">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Users</label>
            <select name="user_id[]" id="user_id[]" multiple class="form-control form-control-sm">
                @foreach ($users as $item)
                    <option {{ in_array($item->id, $attachedUsers) ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->first_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
