<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction',
        'name'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
