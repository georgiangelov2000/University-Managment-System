@extends('layouts.app')


@section('content')
    <form method="post" action="{{ route('subject.store') }}" class="card p-3">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title">
            @if ($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control form-control-sm  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">
            @if ($errors->has('description'))
                <div class="error text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Courses</label>
            <select class="form-control form-control-sm col-md-12" multiple aria-label="multiple select example"
                name="course_id[]">
                @foreach ($courses as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
                @if ($errors->has('course_id'))
                    <div class="error text-danger">{{ $errors->first('course_id') }}</div>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
@endsection
