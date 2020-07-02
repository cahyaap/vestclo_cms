<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    protected $fillable = ['category_id', 'type_id', 'color_id', 'category_size_id', 'price', 'fund', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function size()
    {
        return $this->belongsTo(CategorySize::class, 'category_size_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
