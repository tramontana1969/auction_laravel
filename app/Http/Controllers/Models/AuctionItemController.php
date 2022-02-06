<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Auction_item;
use App\Models\Item;
use Illuminate\Http\Request;

class AuctionItemController extends Controller
{
   public function index() {
       return Auction_item::all();
   }
   public function show($id) {
       return Auction_item::find($id);
   }
   public function store(Request $request) {
       return Auction_item::create($request->all());
   }
   public function update(Request $request, $id) {
       $auction_item = Auction_item::find($id);
       $auction_item->update($request->except(['id']));
       $auction_item->save();
       return $auction_item;
   }
   public function destroy($id) {
       Auction_item::find($id)->delete();
       return response(null, 204);
   }
}
