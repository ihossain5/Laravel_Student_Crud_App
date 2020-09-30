@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Student Crud App</h3>
                        <a style='float:right' href="{{route('add.student')}}">
                            <button type='button' class='btn btn-primary'>Add New </button>
                        </a>
                        </div>
                    <div class="card-body">
                    @if(session('success'))
                       <div class="alert alert-success" role="alert">
                          {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{$students->firstItem()+$loop->index}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone_number}}</td>
                                <td>{{$student->created_at->diffForHumans()}}</td>
                                <td>
                                        <a href="{{url('student/edit/'.$student->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('student/softDelete/'.$student->id)}}" class="btn btn-dark">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{$students->links()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h3>Trash List</h3>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trashData as $student)
                            <tr>
                                <th scope="row">{{$students->firstItem()+$loop->index}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone_number}}</td>
                                <td>{{$student->created_at->diffForHumans()}}</td>
                                <td>
                                        <a href="{{url('restore/student/'.$student->id)}}" class="btn btn-dark">Restore</a>
                                        <a href="{{url('delete/student/'.$student->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{$trashData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
