<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function show() {
        return view('sellers', ['sellers' => User::role('user')->get()]);
    }
    public function showOne($id) {
        return view('one_seller', ['seller' => Seller::find($id), 'user' => Auth::user()]);
    }
    public function add(Request $request) {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'name' => 'required|max:24'
                ]
            );
            $seller = new Seller($user);
            $seller->save();
            return redirect()->refresh();
        }
    }
    public function delete($id) {
        Seller::find($id)->delete();
        return redirect('sellers');
    }
}
