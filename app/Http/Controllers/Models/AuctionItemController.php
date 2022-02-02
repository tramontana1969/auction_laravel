<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Auction_item;
use Illuminate\Http\Request;

class AuctionItemController extends Controller
{
    public function show() {
        return view('auction_items', ['auction_items' => Auction_item::all()]);
    }
    public function showOne($id) {
        return view('one_auction_item', ['auction_item' => Auction_item::find($id)]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'auction_id' => 'required',
                    'item_id' => 'required',
                    'start_price' => 'required',
                    'actual_price' => 'required',
                    'description' => 'required',
                ]
            );
            $auction_item = new Auction_item($data);
            $auction_item->save();
        }
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'auction_id' => 'required',
                    'item_id' => 'required',
                    'start_price' => 'required',
                    'actual_price' => 'required',
                    'description' => 'required',
                ]
            );
            $auction_item = Auction_item::find($id);
            $auction_item->auction_id = $data['auction_id'];
            $auction_item->item_id = $data['item_id'];
            $auction_item->start_price = $data['start_price'];
            $auction_item->actual_price = $data['actual_price'];
            $auction_item->description = $data['description'];
            $auction_item->save();
        }
    }
    public function delete($id) {
        return Auction_item::find($id)->delete();
    }
}
