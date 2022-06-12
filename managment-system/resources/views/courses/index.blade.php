@extends('layouts.app')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="pl-0 d-flex align-items-center">
                        <div class="form-group col-md-2 pl-0">
                            <label class="font-weight-normal">Select by years</label>
                            <select class="form-control form-control-sm">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 pl-0">
                            <label class="font-weight-normal">Select by fee</label>
                            <select class="form-control form-control-sm">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>

                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-sm coursesTable ">
                    <thead>
                        <tr>
                            <th class="p-2">Title</th>
                            <th class="p-2">Year</th>
                            <th class="p-2">Fee</th>
                            <th class="p-2">Created</th>
                            <th class="p-2">Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ mix('js/courses_managment/courses_managment.js') }}"></script>
        <script type="text/javascript">
            var COURSE_DATA = "{{ route('course.api.index') }}"
            var COURSE_EDIT = "{{ route('course.edit', ':id') }}"
            var COURSE_DELETE = "{{ route('course.delete', ':id') }}"
            var COURSE_DETAILS = "{{ route('course.show', ':id') }}"
        </script>
    @endpush
@endsection
