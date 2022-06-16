@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group d-flex">
                    <div class="form-check pl-0 col-md-2">
                        <label for="">Select user</label>
                        <select  name="user_id" id="" class="form-control form-control-sm">
                            <option value="">Choose user</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check pl-0 col-md-2">
                        <label for="">Select subject</label>
                        <select  name="subject_id" id="" class="form-control form-control-sm">
                            <option value="">Choose subject</option>
                            @foreach ($subjects as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-info btn-sm generate">
                    Select
                </button>
                <button class="btn btn-warning btn-sm resetFilters">
                    Reset
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <table class="table table-striped table-bordered table-hover table-sm attendanceTable">
                        <thead>
                            <tr>
                                <th class="p-2">Attendance</th>
                                <th class="p-2">Date of Attendace</th>
                                <th class="p-2">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ mix('js/attendances_managment/attendances_managment.js') }}"></script>
        <script type="text/javascript">
            var ATTENDANCES_API_INDEX = "{{ route('attendance.api.index') }}"
            var ATTENDANCE_DELETE = "{{route('attendance.delete')}}"
        </script>
    @endpush
@endsection
