<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function category()
    {
        return $this->hasOne(BlogCategory::class,'id','category_id')->select('id','title');
    }
}
