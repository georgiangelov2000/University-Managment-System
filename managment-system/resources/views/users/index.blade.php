@extends('layouts.app')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="col-md pl-0 d-flex align-items-center">
                        <div class="form-group col-md-2 pl-0">
                            <label class="font-weight-normal">Select by course</label>
                            <select class="form-control form-control-sm">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
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
                            <label class="font-weight-normal">Select by year of course</label>
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
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ mix('js/users_managment/users_managment.js') }}"></script>
        <script type="text/javascript">
            var USER_DATA = "{{ route('user.api.index') }}"
            var USERDETAILS = "{{ route('user.show', ':id') }}"
            var USER_EDIT = "{{ route('user.edit', ':id') }}"
            var DELETEUSER = "{{ route('user.delete', ':id') }}"
        </script>
    @endpush
@endsection
