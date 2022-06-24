@extends('layouts.app')
@section('content')
    <x-table-template>
        <table class="table table-striped table-bordered table-hover table-sm studentTable" data-id={{ $course->id }}>
            <thead>
                <tr>
                    <th class="p-2">Id</th>
                    <th class="p-2">Picture</th>
                    <th class="p-2">First Name</th>
                    <th class="p-2">Last Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Age</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
        </table>
    </x-table-template>
    @push('scripts')
        <script src="{{ mix('js/courses_managment/students_managment.js') }}"></script>
        <script type="text/javascript">
            var USER_DATA = "{{ route('course.students.api.index', ':id') }}"
        </script>
    @endpush
@endsection
