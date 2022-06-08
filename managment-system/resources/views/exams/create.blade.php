@extends('layouts.app')

@section('content')
    <form method="post" class="card p-3" action="{{ route('exam.store') }}">
        @csrf
        <div class="mb-3">
            <label for="">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control form-control-sm">
                <option value="">Select Subject</option>
                @foreach ($subjects as $item))
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Exam Start</label>
            <input type="datetime-local" class="form-control form-control-sm" name="date_start_exam">
        </div>
        <div class="mb-3">
            <label for="">Exam End</label>
            <input type="datetime-local" class="form-control form-control-sm" name="date_end_exam">
        </div>
        <div class="mb-3">
            <label for="">Users</label>
            <select class="form-control form-control-sm" multiple aria-label="multiple select example" name="user_id[]">
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
