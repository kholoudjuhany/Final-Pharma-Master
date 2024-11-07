<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_total_price',
        'order_date',
        'pre_id',
        'user_id'
    ];

    // Defining the relationship to the Prescription model
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'pre_id');
    }

    // Defining the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
