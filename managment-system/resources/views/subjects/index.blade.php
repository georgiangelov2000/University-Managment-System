@extends('layouts.app')


@section('content')
    <x-table-template>
        <div class="col-md pl-0 d-flex align-items-center">
            <div class="form-group col-md-2 pl-0">
                <label>Select by subject</label>
                <select class="form-control form-control-sm" name="subject_id">
                    <option value="">Select subject</option>
                    @foreach ($subjects as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Description</label>
                <input type="text" class="form-control form-control-sm" placeholder="Description" name="description">
            </div>
            <div class="form-group col-md-2">
                <x-reset-filters></x-reset-filters>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover table-sm  subjectsTable">
            <thead>
                <tr>
                    <th class="p-2">Title</th>
                    <th class="p-2">Description</th>
                    <th class="p-2">Created</th>
                    <th class="p-2">Updated</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
        </table>
    </x-table-template>
    @push('scripts')
        <script src="{{ mix('js/subjects_managment/subjects_managment.js') }}"></script>
        <script type="text/javascript">
            var SUBJECT_DELETE = "{{ route('subject.delete', ':id') }}";
            var SUBJECT_EDIT = "{{ route('subject.edit', ':id') }}";
            var SUBJECT_INDEX = "{{ route('subject.api.index') }}";
            var COURSE_DATA = "{{ route('subject.show', ':id') }}";
            var GET_DETACH_COURSES = "{{ route('subject.course', ':id') }}";
            var POST_DETACH_COURSES = "{{ route('subject.course.detach', ':id') }}";
        </script>
    @endpush
@endsection
