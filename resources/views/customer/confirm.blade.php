@extends('MyLayOut.app')

@section('content')
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card">
                .<div class="card">
                    <div class="card-header fs-3 text-center bg-dark text-white">
                        Cutomer Confirm
                    </div>
                    <div class="card-body fs-4 ">

                         <div class="my-3">
                             <label for="">Name</label> : <label for="">{{ $customer['name'] }}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Email</label> : <label for="">{{ $customer['email'] }}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Phone</label> : <label for="">{{ $customer['phone'] }}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Address</label> : <label for="">{{ $customer['address'] }}</label>
                         </div>

                         <div class="my-3">
                             <label for="">DOB</label> : <label for="">{{ $customer['date_of_birth'] }}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Gender</label> :

                             <label>
                                 @if($customer['gender'] == 1)
                                 Male 
                                 @elseif($customer['gender'] == 2)
                                 Female 
                                 @elseif($customer['gender'] == 0)
                                 Others 
                                 @endif 
                             </label>

                         </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('customer#edit', $customer['id']) }}"><button class="btn btn-sm bg-danger text-white float-end mx-1">Cancle</button></a>
                        <a href="{{ route('customer#realUpdate') }}"><button class="btn btn-sm bg-dark text-white float-end mx-1">Save</button></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection