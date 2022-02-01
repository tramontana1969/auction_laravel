<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name'];
    public function item() {
        return $this->hasMany(Item::class);
    }
}
