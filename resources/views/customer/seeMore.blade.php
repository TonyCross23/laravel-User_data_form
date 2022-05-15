@extends('MyLayOut.app')

@section('content')
    <div class="row ">
        <div class="col-md-6 offset-3">
            <div class="card">
                .<div class="card">
                    <div class="card-header fs-3 text-center bg-dark text-white">
                        Cutomer Data
                    </div>
                    <div class="card-body fs-4 ">
                         <div class="my-3">
                             <label for="">ID</label> : <label for="">{{$customer[0]['customer_id']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Name</label> : <label for="">{{$customer[0]['name']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Email</label> : <label for="">{{$customer[0]['email']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Phone</label> : <label for="">{{$customer[0]['phone']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Address</label> : <label for="">{{$customer[0]['address']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">DOB</label> : <label for="">{{$customer[0]['date_of_birth']}}</label>
                         </div>

                         <div class="my-3">
                             <label for="">Gender</label> :

                             <label for="">
                                 @if($customer[0]['gender'] == 1)
                                 Male 
                                 @elseif($customer[0]['gender'] == 2)
                                 Female 
                                 @elseif($customer[0]['gender'] == 0)
                                 Others 
                                 @endif 
                             </label>

                         </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('customer#list') }}"><button class="btn btn-sm bg-dark text-white float-end">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection