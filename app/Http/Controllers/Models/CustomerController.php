<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function show() {
        return view('customers', ['customers' => User::role('user')->get()]);
    }
    public function showOne($id) {
        return view('one_customer', ['customer' => Customer::find($id), 'user' => Auth::user()]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:24'
                ]
            );
            $customer = new Customer($data);
            $customer->save();
            return redirect()->refresh();
        }
    }
    public function delete($id) {
        Customer::find($id)->delete();
        return redirect('customers');
    }
}
