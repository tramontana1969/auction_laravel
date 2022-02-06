<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request) {
        $seller = Seller::all();
        return $seller;
    }
    public function show($id) {
        return $seller = Seller::find($id);
    }
    public function store(Request $request) {
        $seller = Seller::create($request -> all());
        return $seller;
    }
    public function update(Request $request, $id) {
        $seller = Seller::find($id);
        $seller -> update($request->except(['id']));
        $seller -> save();
        return response()->json($seller);
    }
    public function destroy($id) {
        Seller::find($id)->delete();
        return response(null, 204);
    }
}
