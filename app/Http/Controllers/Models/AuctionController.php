<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index() {
        return Auction::all();
    }
    public function show($id) {
        return Auction::find($id);
    }
    public function store(Request $request) {
        return Auction::create($request->all());
    }
    public function update(Request $request, $id) {
        $auction = Auction::find($id);
        $auction->update($request->except(['id']));
        $auction->save();
        return response()->json($auction);
    }
    public function destroy($id) {
        Auction::find($id)->delete();
        return response(null, 204);
    }
}
