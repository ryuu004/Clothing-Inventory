<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Specify the table name if it's not the plural form of the model

    // Define the fillable properties
    protected $fillable = [
        'name', 'type', 'size', 'color', 'qty', 'total_price', 'date'
    ];

    /**
     * Define the relationship with the Item model.
     */
    public function item()
    {
        return $this->belongsTo(Item::class); // A transaction belongs to a specific item
    }
}

