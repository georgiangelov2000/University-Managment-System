@extends('layouts.app')


@section('content')
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <div>
                            <div class="">
                                <button data-id={{ $item->id }} type="button"
                                    class="mr-1 btn btn-primary btn-sm bootbox">
                                    Course
                                </button>
                                <a href="{{ route('user.edit', $item->id) }}"
                                    class="mr-1 btn btn-sm btn-warning">Edit</a>
                                <a data-id={{ $item->id }} class="btn btn-danger btn-sm delete">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @push('scripts')
        <script type="text/javascript">
            var USERDETAILS = "{{ route('user.show', ':id') }}"
            var DELETEUSER = "{{ route('user.delete', ':id') }}"
        </script>
        <script src="{{ mix('js/user_action.js') }}"></script>
    @endpush
@endsection
