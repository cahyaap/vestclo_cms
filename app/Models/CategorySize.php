<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySize extends Model
{
    protected $fillable = ['category_id', 'size_id', 'p', 'l'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
