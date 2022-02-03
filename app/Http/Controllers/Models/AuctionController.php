<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function show() {
        return view('auctions', ['auctions' => Auction::all()]);
    }
    public function showOne($id) {
        return view('one_auction', ['auction' => Auction::find($id)]);
    }
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'date' => 'required',
                    'time' => 'required',
                    'place' => 'required|max:64',
                    'description' => 'required',
                ]
            );
        }
        $auction = new Auction($data);
        $auction->save();
        return redirect()->refresh();
    }
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'date' => 'required',
                    'time' => 'required',
                    'place' => 'required|max:64',
                    'description' => 'required',
                ]
            );
            $auction = Auction::find($id);
            $auction->date = $data['date'];
            $auction->time = $data['time'];
            $auction->place = $data['place'];
            $auction->description = $data['description'];
            $auction->save();
            return redirect()->refresh();
        }
    }
    public function delete($id) {
        Auction::find($id)->delete();
        return redirect('auctions');
    }
}
