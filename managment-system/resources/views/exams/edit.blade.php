@extends('layouts.app')

@section('content')
    <form method="post" class="card shadow-sm p-3 mt-5" action="{{ route('exam.update',$exam->id) }}">
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
            <input type="datetime-local" value="{{$exam->date_start_exam}}" class="form-control form-control-sm" name="date_start_exam">
        </div>
        <div class="mb-3">
            <label for="">Exam End</label>
            <input type="datetime-local" value="{{$exam->date_end_exam}}" class="form-control form-control-sm" name="date_end_exam">
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
