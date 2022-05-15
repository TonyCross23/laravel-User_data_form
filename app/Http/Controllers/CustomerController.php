<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
     //customer register page
    public function register () {
        return view('customer.register');
    }
    //create customer account
    public function create (Request $request) {

        $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required',
             'phone' => 'required',
             'address' => 'required',
             'dob' => 'required',
             'gender' => 'required',

        ],[
            'name.required' => "Name Required",
            'email.required' => "email Required",
            'phone.required' => "phone Required",
            'address.required' => "address Required",
            'dob.required' => "date of birth Required",
            'gender.required' => "gender Required",
        ]);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
         }

           $data = $this->getCustomerData($request);
           //MVC => modal viwe controller

           //create 
           //modal call  data => array

            Customer::create($data); //array format
            return back()->with(['insertSuccess' => 'User Information Recorted....']);
    }
    //customer list blade
    public function list () {
        $data = Customer::paginate(10); //object
      
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

    //customer data update
    public function update ($id, Request $request) {

         //validation message customer data
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',

       ],[
           'name.required' => "Name Required",
           'email.required' => "email Required",
           'phone.required' => "phone Required",
           'address.required' => "address Required",
           'dob.required' => "date of birth Required",
           'gender.required' => "gender Required",
       ]);

       if ($validator->fails()) {
           return back()
                       ->withErrors($validator)
                       ->withInput();
        }
        $updateData = $this->getCustomerData($request);
        $updateData ['id'] = $id;

        Session::put('CUSTOMER_DATA', $updateData);
        return redirect()->route('customer#confirm');  
        // Customer::where('customer_id',$id)->update($updateData);
        // return redirect()->route('customer#list')->with(['updateSuccess' => 'Customer Data Updated!']);

    }
    //customer confirm page
    public function confirm () {
        $data =  Session::get('CUSTOMER_DATA');
        return view ('customer.confirm')->with(['customer' => $data]);
    }


    //customer real Update
    public function realUpdate () {
        $data = Session::get('CUSTOMER_DATA');
        $id = $data['id'];
        unset($data['id']); // remove id in array
        Session::forget('CUSTOMER_DATA'); //session deleate
        
        Customer::where('customer_id',$id)->update($data);
        return redirect ()->route('customer#list')->with(['updateSuccess' => 'Customer Updated!']);

    }



    //request customer data
    private function getCustomerData($request){

        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' =>$request->dob,
            'address' => $request->address,
            'gender' => $request->gender,
        ];
    }
}
