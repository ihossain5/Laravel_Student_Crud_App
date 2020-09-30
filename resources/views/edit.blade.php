@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Update Student Data
                       <a style='float:right' href="{{route('all.student')}}">
                         <button type='button' class='btn btn-primary'>Back </button>
                        </a>
                        </div>

                    <div class="card-body ">
                           <form action="{{url('student/store/'.$students->id)}}" method="post">
                           @csrf
                               <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control">
                               </div>
                               <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"value="{{$students->email}}" class="form-control">
                               </div>
                               <div class="form-group">
                                    <label for="number">Phone Number</label>
                                    <input type="tel" name="number" id="number"value="{{$students->phone_number}}" class="form-control">
                               </div>
                                    <button type="submit" text="center" class="btn btn-primary">Update</button>
                           </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
