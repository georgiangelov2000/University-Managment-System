@extends('layouts.app')

@section('content')
    <x-table-template>
        <div class="form-group">
            <div class="pl-0 d-flex align-items-center">
                <div class="form-group col-md-2 pl-0 mb-0">
                    <label>Select by years</label>
                    <select class="form-control form-control-sm" name="year">
                        <option value="">Select year</option>
                        @foreach ($years as $item)
                            <option value="{{ $item->year_of_course }}">{{ $item->year_of_course }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2 pl-0 mb-0">
                    <label>Select by fee</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Fee" name="fee">
                </div>
                <div class="form-group col-md-2">
                <x-reset-filters></x-reset-filters>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover table-sm coursesTable ">
            <thead>
                <tr>
                    <th class="p-2">Title</th>
                    <th class="p-2">Year</th>
                    <th class="p-2">Fee</th>
                    <th class="p-2">Created</th>
                    <th class="p-2">Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </x-table-template>

    @push('scripts')
        <script src="{{ mix('js/courses_managment/courses_managment.js') }}"></script>
        <script type="text/javascript">
            var COURSE_DATA = "{{ route('course.api.index') }}"
            var COURSE_EDIT = "{{ route('course.edit', ':id') }}"
            var COURSE_DELETE = "{{ route('course.delete', ':id') }}"
            var COURSE_DETAILS = "{{ route('course.show', ':id') }}"
            var COURSE_PROGRAM_CREATE = "{{ route('course.create.program', ':id') }}"
            var STUDENTS = "{{ route('course.students', ':id') }}"
        </script>
    @endpush
@endsection
