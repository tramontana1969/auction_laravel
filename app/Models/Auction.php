<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'place',
        'description'
    ];
    public function item() {
        return $this->belongsToMany('App\Models\Item');
    }
}
