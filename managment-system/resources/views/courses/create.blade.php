@extends('layouts.app')


@section('content')
    <form method="post" action="{{route('course.store')}}" class="card p-3">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title">
            @if ($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Year of course</label>
            <input type="text" class="form-control form-control-sm {{ $errors->has('year_of_course') ? 'is-invalid' : '' }}" name="year_of_course">
            @if ($errors->has('year_of_course'))
                <div class="error text-danger">{{ $errors->first('year_of_course') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fee</label>
            <input type="text" class="form-control form-control-sm {{ $errors->has('fee') ? 'is-invalid' : '' }}" name="fee">
            @if ($errors->has('fee'))
                <div class="error text-danger">{{ $errors->first('fee') }}</div>
            @endif
        </div>
        <div class="mb-3">p
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
@endsection
