@extends('layouts.app')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-sm  userHasExams"
                    data-exam-id={{ $exam->id }}>
                    <thead>
                        <tr>
                            <th class="p-2">Picture</th>
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
            </div>
        </div>
        </table>
        @push('scripts')
            <script src="{{ mix('js/exams_managment/user_has_exams.js') }}"></script>
            <script type="text/javascript">
                var USER_VIEW = "{{ route('exam.api.user', ':id') }}";
                var STUDENT_DETACH = "{{route('exam.student.detach',':id')}}";
                var USER_IS_TAKEN_EXAM = "{{route('user.exam.taken',':id')}}";
            </script>
        @endpush
    @endsection
