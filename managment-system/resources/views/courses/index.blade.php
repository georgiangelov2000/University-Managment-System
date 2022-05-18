@extends('layouts.app')


@section('content')
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Fee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->year_of_course }}</td>
                    <td>{{ $item->fee }}</td>
                    <td>
                        <div class="">
                            <button data-id={{ $item->id }} type="button" class="mr-1 btn btn-primary btn-sm bootbox">
                                Users
                            </button>
                            <a href="{{route('course.edit',$item->id)}}" class="mr-1 btn btn-sm btn-warning">Edit</a>
                            <a data-id={{ $item->id }} class="btn btn-danger btn-sm delete">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @push('scripts')
        <script type="text/javascript">
            var COURSEDETAILS = "{{ route('course.show', ':id') }}"
            var DELETECOURSE = "{{ route('course.delete', ':id') }}"
        </script>
        <script type="text/javascript" src="{{ mix('js/course_action.js') }}"></script>
    @endpush
@endsection
