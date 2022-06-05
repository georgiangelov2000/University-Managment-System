@extends('layouts.app')


@section('content')
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Exam</th>
                <th>End Exam</th>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $item)
                <tr>
                    <td>{{ $item->subjects->title}}</td>
                    <td>{{ $item->date_start_exam}}</td>
                    <td>{{ $item->date_end_exam}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('exam.show',$item->id)}}" >
                            Students
                        </a>
                        <a class="btn btn-sm btn-warning" href="{{route('exam.edit',$item->id)}}" >
                            Edit
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{route('exam.delete',$item->id)}}" >
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
