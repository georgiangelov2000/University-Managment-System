@extends('layouts.app')


@section('content')
    <form method="post" action="{{route('course.store')}}" class="card shadow-sm p-3 mt-5">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm" name="title">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Year of course</label>
            <input type="text" class="form-control form-control-sm" name="year_of_course">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fee</label>
            <input type="text" class="form-control form-control-sm" name="fee">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
