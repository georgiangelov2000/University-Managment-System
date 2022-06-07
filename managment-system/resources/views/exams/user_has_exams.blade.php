@extends('layouts.app')


@section('content')
    <table class="table table-striped table-bordered table-hover table-sm  userHasExams" data-exam-id={{$exam->id}}>
        <thead>
            <tr>
                <th class="p-2">First name</th>
                <th class="p-2">Last name</th>
                <th class="p-2">Age</th>
                <th class="p-2">Course</th>
                <th class="p-2">Created at</th>
                <th class="p-2">Updated at</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>

    </table>
    @push('scripts')
    <script src="{{mix('js/exams_managment/user_has_exams.js')}}"></script>
    <script type="text/javascript">
        var USER_VIEW = "{{route('exam.api.user', ':id')}}";
    </script>
@endpush
@endsection
