@extends('layouts.app')


@section('content')
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td class="col-md-5">
                        <div class="table-description">
                            {{ $item->description }}
                        </div>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td class="col-md-3">
                        <div class="ml-0 d-flex justify-content-evenly">
                            <button  data-id={{ $item->id }}  type="button" class=" btn btn-primary btn-sm bootbox-courses">
                                Courses
                            </button>
                            <a data-id={{ $item->id }} type="button" class=" btn btn-secondary btn-sm bootbox-detach-course">
                                Detach Course
                            </a>
                            <a href="{{ route('subject.edit', $item->id) }}" class=" btn btn-sm btn-warning">Edit</a>
                            <a data-id={{ $item->id }} class=" btn btn-danger btn-sm delete">
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
            var DELETE_SUBJECT = "{{route('subject.delete', ':id')}}";
            var SUBJECT_INDEX = "{{route('subject.index')}}";
            var COURSE_DATA = "{{route('subject.show', ':id')}}"
            var GET_DETACH_COURSES ="{{route('subject.course', ':id')}}"
            var POST_DETACH_COURSES ="{{route('subject.course.detach', ':id')}}"
        </script>
        <script src="{{mix('js/subject_action.js')}}"></script>
    @endpush
@endsection
