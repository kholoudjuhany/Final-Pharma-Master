<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'med_name',
        'med_quantity',
        'med_img',
        'med_price',
        'cat_id'
    ];

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    // Relationship to prescriptions via PreMed
    public function premeds() 
    {
        return $this->hasMany(PreMed::class, 'med_id'); // pre_id links PreMed to Prescription
    }
}

