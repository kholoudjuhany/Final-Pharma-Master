<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preMed extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'notes',
        'pre_id',
        'med_id'
    ];

    // Define the relationship to the Prescription model
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'pre_id');
    }

    // Define the relationship to the Med model
    public function med()
    {
        return $this->belongsTo(Med::class, 'med_id');
    }
}
