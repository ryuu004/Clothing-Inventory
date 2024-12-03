<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items'; // Specify the table name if it's not the plural form of the model

    // Define the fillable properties
    protected $fillable = [
        'name', 'category', 'size', 'color', 'price', 'stock'
    ];

    /**
     * Define the relationship with the Transaction model.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class); // An item can have many transactions
    }
}