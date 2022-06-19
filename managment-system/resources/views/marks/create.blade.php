@extends('layouts.app')
@section('content')
    <form method="post" class="p-3 card marksForm" action="{{route('mark.store')}}">
        @csrf
        <div class="col-md-6">
            <div class="mb-3 col-md-10 pl-0">
                <label for="">Select user</label>
                <select name="user_id" id="" class="form-control form-control-sm">
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->first_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-warning btn-sm addMarkFields">
                Add mark field
            </button>
            <button type="button" class="btn btn-info btn-sm removeMarkFields">
                Remove mark field
            </button>
            <div class="mark-wrapper">
                <div class="d-flex mt-2 mark-content">
                    <div class="mb-3 col-md-5 pl-0">
                        <label for="">Subject</label>
                        <select name="subject_id[]" id="" class="form-control form-control-sm">
                            @foreach ($subjects as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label for="">Mark</label>
                        <input name="mark[]" type="text" min="2" max="6" placeholder="Min:2 Max:6" class="form-control form-control-sm"  id="">
                    </div>
                    <div class="mb-3 col-md-5">
                        <label for="">Date</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="datepicker form-control form-control-sm" placeholder="dd-mm-yy" name="date_of_mark[]">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
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
