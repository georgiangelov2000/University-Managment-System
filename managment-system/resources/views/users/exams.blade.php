@extends('layouts.app')


@section('content')
    <x-table-template>
        <table class="table table-striped table-bordered table-hover table-sm userTable ">
            <thead>
                <tr>
                    <th class="p-2">Picture</th>
                    <th class="p-2">First Name</th>
                    <th class="p-2">Last Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Age</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Course</th>
                    <th class="p-2">Created</th>
                    <th class="p-2">Updated</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
        </table>
    </x-table-template>

    @push('scripts')

    @endpush
@endsection
