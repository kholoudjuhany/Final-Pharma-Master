<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'cat_description',
    ];

    // Defining the relationship to the Med model
    public function meds()
    {
        return $this->hasMany(Med::class, 'cat_id');
    }
}
