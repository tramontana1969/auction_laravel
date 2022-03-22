<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function show() {
        $user = Auth::user();
        $check = Auth::check();

        return view('items', [
            'items' => Item::all(),
            'customers' => Customer::all(),
            'user' => $user,
            'check' => $check,
        ]);
    }
    public function showOne($id) {
        $item = Item::find($id);
        $user = Auth::user();
        $customer = $item->customer;
        $other_customers = Customer::all()->where('id', '!=', $item->customer_id);
        $all_customers = Customer::all();
        $check = Auth::check();
        return view('one_item', [
            'item' => $item,
            'user' => $user,
            'customer' => $customer,
            'other_customers' => $other_customers,
            'all_customers' => $all_customers,
            'check' => $check,
        ]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:48',
                    'lot'=> 'nullable',
                    'seller_id' => 'required',
                    'customer_id' => 'nullable',
                ]
            );
            $item = new Item($data);
            $item->save();
            return redirect()->refresh();
        }
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:48',
                    'lot' => 'nullable',
                    'seller_id' => 'required',
                    'customer_id' => 'nullable',
                ]
            );
            $item = Item::find($id);
            $item->name = $data['name'];
            $item->lot = $data['lot'];
            $item->seller_id = $data['seller_id'];
            $item->customer_id = $data['customer_id'];
            $item->save();
            return redirect()->refresh();
        }
    }
    public function delete($id) {
        Item::find($id)->delete();
        return redirect('items');
    }
}
