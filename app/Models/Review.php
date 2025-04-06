<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function customer(){
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id')->select('id', 'image', 'name');
    }

}
