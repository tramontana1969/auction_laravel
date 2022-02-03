<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Auction_item;
use App\Models\Item;
use Illuminate\Http\Request;

class AuctionItemController extends Controller
{
    public function show() {
        return view('auction_items', [
            'auction_items' => Auction_item::all(),
            'auctions' => Auction::all(),
            'items' => Item::all()
        ]);
    }
    public function showOne($id) {
        $auction_item = Auction_item::find($id);
        $auction = $auction_item->auction;
        $other_auctions = Auction::all()->where('id', '!=', $auction_item->auction_id);
        $item = $auction_item->item;
        $other_items = Item::all()->where('id', '!=', $auction_item->item_id);
        return view('one_auction_item', [
            'auction_item' => $auction_item,
            'auction' => $auction,
            'other_auctions' => $other_auctions,
            'item' => $item,
            'other_items' => $other_items,
        ]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'auction_id' => 'required',
                    'item_id' => 'required',
                    'start_price' => 'required',
                    'actual_price' => 'nullable',
                    'description' => 'required',
                ]
            );
            $auction_item = new Auction_item($data);
            $auction_item->save();
            return redirect()->refresh();
        }
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'auction_id' => 'required',
                    'item_id' => 'required',
                    'start_price' => 'required',
                    'actual_price' => 'nullable',
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
            return redirect()->refresh();
        }
    }
    public function delete($id) {
        Auction_item::find($id)->delete();
        return redirect('prices');
    }
}
