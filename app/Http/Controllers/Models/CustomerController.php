<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show() {
        return view('customers', ['customers' => Customer::all()]);
    }
    public function showOne($id) {
        return view('one_customer', ['customer' => Customer::find($id)]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name'
                ]
            );
            $customer = new Customer($data);
            $customer->save();
        }
    }
    public function edit(Request $request, $id) {
        if($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name'
                ]
            );
            $customer = Customer::find($id);
            $customer->name = $data['name'];
            $customer->save();
        }
    }
    public function delete($id) {
        Customer::find($id)->delete();
    }
}
