@extends('layouts.app')


@section('content')
    <table class="table table-striped table-bordered table-hover table-sm  examsTable ">
        <thead>
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2">Start Exam</th>
                <th class="p-2">End Exam</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
    </table>
    @push('scripts')
    <script src="{{ mix('js/exams_managment/exams_managment.js') }}"></script>
        <script type="text/javascript">
            var EXAM_EDIT = "{{route('exam.edit',':id')}}";
            var EXAM_DELETE = "{{route('exam.delete',':id')}}";
            var EXAM_SHOW = "{{route('exam.show',':id')}}";
            var EXAM_API_INDEX = "{{route('exam.api.index')}}";
        </script>
    @endpush
@endsection
