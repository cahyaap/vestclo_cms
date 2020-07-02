<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name', 'mobile', 'shirt_id', 'quantity', 'status_transaction_id'];

    public function status()
    {
        return $this->belongsTo(StatusTransaction::class, 'status_transaction_id');
    }
    public function shirt()
    {
        return $this->belongsTo(Shirt::class);
    }
}
