<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return Item::all();
    }
    public function show($id) {
        return Item::find($id);
    }
    public function store(Request $request) {
        return Item::create($request->all());
    }
    public function update(Request $request, $id) {
        $item = Item::find($id);
        $item->update($request->except(['id']));
        $item->save();
        return $item;
    }
    public function destroy($id) {
        Item::find($id)->delete();
        return response(null, 204);
    }
}
