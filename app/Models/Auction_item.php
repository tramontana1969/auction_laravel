<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_id',
        'item_id',
        'start_price',
        'actual_price',
        'description',
    ];
    public function auction() {
        return $this->belongsTo('App\Models\Auction');
    }
    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
}
