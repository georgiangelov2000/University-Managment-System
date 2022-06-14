@extends('layouts.app')
@section('content')
    <form method="post" class="p-3 card marksForm" action="">
        @csrf
        <div class="col-md-6">
            <div class="mb-3 col-md-10 pl-0">
                <label for="">Select user</label>
                <select name="user_id" id="" class="form-control form-control-sm">
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-warning btn-sm addMarkFields">
                Add attendance field
            </button>
            <button type="button" class="btn btn-info btn-sm removeMarkFields">
                Remove attendance field
            </button>
            <div class="mark-wrapper">
                <div class="d-flex mt-2 mark-content">
                    <div class="mb-3 col-md-5 pl-0">
                        <label for="">Subject</label>
                        <select name="subject_id[]" id="" class="form-control form-control-sm">
                            @foreach ($subjects as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label for="">Date</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yy"
                                name="date_of_mark[]">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 col-md-5 d-flex align-items-center mb-0 justify-content-around">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                            <label for="customCheckbox1" class="custom-control-label">Attended</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="option2">
                            <label for="customCheckbox2" class="custom-control-label">Didn't attended</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
    @push('scripts')
        <script src="{{ mix('js/marks_managment/marks_actions.js') }}"></script>
    @endpush
@endsection