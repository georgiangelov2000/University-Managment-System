@extends('layouts.app')


@section('content')
    <form method="post" action="{{ route('subject.update', $subject->id) }}" class="card shadow-sm p-3 mt-5">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm" value="{{ $subject->title }}" name="title">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control form-control-sm" name="description" value="{{ $subject->description }}">
        </div>
        <select class="form-control form-control-sm col-md-12" multiple aria-label="multiple select example" name="course_id[]">
            @foreach ($courses as $item)
                <option {{ in_array($item->id, $courseSubjects) ? 'selected' : '' }} value="{{ $item->id }}">
                    {{ $item->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
