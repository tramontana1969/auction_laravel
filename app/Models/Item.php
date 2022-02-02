<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lot',
        'seller_id',
        'customer_id',
    ];
    public function seller() {
        return $this->belongsTo('App\Models\Seller');
    }
    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }
    public function auction() {
        return $this->belongsToMany('App\Models\Auction');
    }
}
