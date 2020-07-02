<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'colorpicker', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
