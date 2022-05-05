<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     //customer register page
    public function register () {
        return view('customer.register');
    }
    //create customer account
    public function create (Request $request) {

           $data = $this->getCustomerData($request);
           //MVC => modal viwe controller

           //create 
           //modal call  data => array

            Customer::create($data); //array format
            return back()->with(['insertSuccess' => 'User Information Recorted....']);
    }
    //customer list blade
    public function list () {
        $data = Customer::get(); //object
      
        return view ('customer.list')->with(['customer'=> $data]);
    }
    //customer data show
    public function seeMore ($id) {
       $data = Customer::where('customer_id', $id)->get()->toArray(); //obiect
        
       return view('customer.seeMore')->with(['customer' => $data]);
    }

    //deleate customer data
    public function delete($id) {
        Customer::where('customer_id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Customer Data Deleted!']);
    }
    //customer data edit
    public function edit ($id) {
        $data = Customer::where('customer_id',$id)->first();
        // dd($data->toArray());
        return view ('customer.edit')->with(['customer' => $data]);
    }

    //request customer data
    private function getCustomerData($request){

        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phoneNumber,
            'date_of_birth' =>$request->dob,
            'address' => $request->address,
            'gender' => $request->gender,
        ];
    }
}
