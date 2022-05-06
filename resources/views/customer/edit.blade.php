@extends('layouts.app')

@section('content')
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card">
                    <div class="card-header fs-3 text-center">
                        Cutomer Data
                    </div>
                    <div class="card-body fs-4 ">

                        <form action="" method="post">
                            @csrf
                        <div class="my-3">
                             <label for="">Name</label> 
                             <input type="text" name="name"  class="form-control" value="{{ $customer->name }}">

                         </div>

                         <div class="my-3">
                             <label for="">Email</label> 
                             <input type="email" name="email"  class="form-control" value="{{ $customer->email }}">
                         </div>

                         <div class="my-3">
                             <label for="">Phone</label> 
                             <input type="number" name="phone"  class="form-control" value="{{ $customer->phone }}">
                         </div>
                         
                         <div class="my-3">
                             <label for="">Address</label> 
                             <textarea name="address"  cols="30" rows="4" class="form-control" >{{ $customer->address }}</textarea>
                         </div>

                         <div class="my-3">
                             <label for="">Date of Birth</label> 
                             <input type="date" name="dob"  class="form-control" value="{{ $customer->date_of_birth }}">
                         </div>

                         <div class="my-3">
                             <label for="">Gender</label> <br>
                             <select name="gender" class="form-control">
                               @if($customer->gender == 1)
                                    <option value="empty">Chose Options....</option>
                                    <option value="1"selected>Male</option>
                                    <option value="2">Female</option>
                                    <option value="0">Other</option>
                                 @elseif($customer->gender == 2)
                                    <option value="empty">Chose Options....</option>
                                    <option value="1">Male</option>
                                    <option value="2" selected>Female</option>
                                    <option value="0">Other</option>
                                 @elseif($customer->gender == 0)
                                    <option value="empty">Chose Options....</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="0" selected>Other</option> 
                                @else
                                <option value="empty" selected>Chose Options....</option>
                               <option value="1">Male</option>
                               <option value="2">Female</option>
                               <option value="0">Other</option>
                               @endif 
                           </select>
                         </div>
                         <div class="my-3 float-end">
                             <input type="submit" value="Update" class="btn btn-primary text-white">
                         </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('customer#list') }}"><button class="btn btn-sm bg-dark text-white float-end">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection