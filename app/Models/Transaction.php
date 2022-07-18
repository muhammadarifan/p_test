<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'transaction_category_id',
        'nominal',
        'description',
        'date',
        'confirmed',
    ];

    public function transactionCategory()
    {
        return $this->belongsTo(TransactionCategory::class);
    }


}
