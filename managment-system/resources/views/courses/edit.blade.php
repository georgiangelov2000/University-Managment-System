@extends('layouts.app')


@section('content')
    <form method="post" action="{{route('course.update',$course->id)}}" class="card p-3">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" value="{{ $course->title }}" class="form-control form-control-sm" name="title">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Year of course</label>
            <input type="text" value="{{ $course->year_of_course }}" class="form-control form-control-sm" name="year_of_course">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fee</label>
            <input type="text" value="{{ $course->fee }}" class="form-control form-control-sm" name="fee">
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
