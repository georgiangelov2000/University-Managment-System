@extends('layouts.app')


@section('content')
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

    @push('scripts')
        <script src="{{mix('js/subjects_managment/subjects_managment.js')}}"></script>
        <script type="text/javascript">
            var SUBJECT_DELETE = "{{route('subject.delete', ':id')}}";
            var SUBJECT_EDIT = "{{route('subject.edit', ':id')}}";
            var SUBJECT_INDEX = "{{route('subject.api.index')}}";
            var COURSE_DATA = "{{route('subject.show', ':id')}}";
            var GET_DETACH_COURSES ="{{route('subject.course', ':id')}}";
            var POST_DETACH_COURSES ="{{route('subject.course.detach', ':id')}}";
        </script>
    @endpush
@endsection
