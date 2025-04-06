<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function pages()
    {
        return $this->hasMany(CreatePage::class, 'category_id');
    }
}
