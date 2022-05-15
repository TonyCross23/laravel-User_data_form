@extends('MyLayOut.app')

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
                           <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                           @if($errors->has('name'))
                           <p class="text-danger">{{ $errors->first('name') }}</p>
                           @endif
                       </div>

                       <div class="my-2">
                           <label for="">Email</label>
                           <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                           @if($errors->has('email'))
                           <p class="text-danger">{{ $errors->first('email') }}</p>
                           @endif
                       </div>

                       <div class="my-2">
                           <label for="">Phone Number</label>
                           <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                           @if($errors->has('phone'))
                           <p class="text-danger">{{ $errors->first('phone') }}</p>
                           @endif
                       </div>

                       <div class="my-2">
                           <label for="">Date Of Birth</label>
                           <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                           @if($errors->has('dob'))
                           <p class="text-danger">{{ $errors->first('dob') }}</p>
                           @endif
                       </div>

                       <div class="my-2">
                           <label for="">Address</label>
                           <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ old('address') }}</textarea>
                           @if($errors->has('address'))
                           <p class="text-danger">{{ $errors->first('address') }}</p>
                           @endif
                       </div>

                       <div class="my-2">
                           <label for="">Gender</label> <br>
                           <select name="gender" id="" value="{{ old('gender') }}">
                               <option value="">Chose Options....</option>
                               <option value="1">Male</option>
                               <option value="2">Female</option>
                               <option value="0">Other</option>
                           </select>
                           @if($errors->has('gender'))
                           <p class="text-danger">{{ $errors->first('gender') }}</p>
                           @endif
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