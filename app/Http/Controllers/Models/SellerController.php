<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function show() {
        return view('sellers', ['sellers' => Seller::all()]);
    }
    public function showOne($id) {
        return view('one_seller', ['seller' => Seller::find($id)]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:24'
                ]
            );
            $seller = new Seller($data);
            $seller->save();
        }
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:24'
                ]
            );
            $seller = Seller::find($id);
            $seller->name = $data['name'];
            $seller->save();
        }
    }
    public function delete($id) {
        Seller::find($id)->delete();
    }
}
