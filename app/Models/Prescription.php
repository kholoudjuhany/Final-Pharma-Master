<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'pre_details',
        'user_id',
        'doctor_response',
        'bill',
        'submited_at'
    ];

    protected $dates = ['submited_at'];

    public function user() // Define user relationship
    {
        return $this->belongsTo(User::class);
    }

    public function orders() // Define orders relationship
    {
        return $this->hasMany(Order::class, 'pre_id');
    }

    public function meds() // Define many-to-many relationship with Med
    {
        return $this->belongsToMany(Med::class, 'pre_meds')
            ->withPivot('quantity', 'notes')
            ->withTimestamps();
    }

    public function premeds() // Add this method for the PreMed relationship
    {
        return $this->hasMany(PreMed::class, 'pre_id'); // Assuming pre_id is the foreign key in PreMed table
    }
}
