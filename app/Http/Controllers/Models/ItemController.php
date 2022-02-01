<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show() {
        return view('items', ['items' => Item::all()]);
    }
    public function showOne($id) {
        return view('one_item', ['item' => Item::find($id)]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:48',
                    'lot' => 'required',
                    'seller_id' => 'required',
                    'customer_id' => 'required',
                ]
            );
            $item = new Item($data);
            $item->save();
        }
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:48',
                    'lot' => 'required',
                    'seller_id' => 'required',
                    'customer_id' => 'required',
                ]
            );
            $item = Item::find($id);
            $item->name = $data['name'];
            $item->lot = $data['lot'];
            $item->seller_id = $data['seller_id'];
            $item->customer_id = $data['customer_id'];
            $item->save();
        }
    }
    public function delete($id) {
        Item::find($id)->delete();
    }
}
