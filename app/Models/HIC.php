<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HIC extends Model
{
    use HasFactory;

    protected $fillable = ['HIC_name', 'HIC_disscount', 'HIC_email', 'HIC_mobile'];

    // Defining the inverse relationship to the User model
    public function users()
    {
        return $this->hasMany(User::class, 'HIC_id');
    }
}
