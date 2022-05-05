@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="my-2 text-end">
               <a href="{{ route ('customer#list')}}"> <button class="btn btn-secondary">List Page</button></a>
            </div>
            <div class="card">
                <div class="card-header text-center fs-3 bg-dark text-white">Customer Register Form</div>
                <div class="card-body">

                @if (Session::has('insertSuccess'))
                    
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ Session::get('insertSuccess')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif

                   <form action="{{ route ('customer#create')}}" method="post">
                       @csrf
                       <div class="my-2">
                           <label for="">Name</label>
                           <input type="text" name="name" class="form-control">
                       </div>

                       <div class="my-2">
                           <label for="">Email</label>
                           <input type="email" name="email" class="form-control">
                       </div>

                       <div class="my-2">
                           <label for="">Phone Number</label>
                           <input type="number" name="phoneNumber" class="form-control">
                       </div>

                       <div class="my-2">
                           <label for="">Date Of Birth</label>
                           <input type="date" name="dob" class="form-control">
                       </div>

                       <div class="my-2">
                           <label for="">Address</label>
                           <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                       </div>

                       <div class="my-2">
                           <label for="">Gender</label> <br>
                           <select name="gender" id="">
                               <option value="empty">Chose Options....</option>
                               <option value="1">Male</option>
                               <option value="2">Female</option>
                               <option value="0">Other</option>
                           </select>
                       </div>

                       <div class="my-2">
                           <input type="submit" class="btn bg-dark text-white float-end" value="Register">
                       </div>

                     
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection