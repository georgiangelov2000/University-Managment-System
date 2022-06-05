@extends('layouts.app')


@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Age</th>
                <th>Role</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item['courses']['title'] }}</td>
                    <th>
                        <form method="post" action="{{ route('exam.student.detach', $exam->id) }}">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" />
                            <button class="btn btn-secondary btn-sm" name="user_id" value={{ $item->id }}
                                class="remove">
                                Detach Student
                            </button>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Exam Taken</label>
                              </div>
                              <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Failed Exam</label>
                              </div>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script type="text/javascript">
            var DETACH_STUDENT = "{{ route('exam.student.detach', ':id') }}";
        </script>
    @endpush
@endsection
