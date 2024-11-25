<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'programCode', 
        'title', 
        'description', 
        'startDate', 
        'endDate', 
        'price', 
        'isActive', 
        'createdBy'
    ];

    protected $casts = [
        'isActive' => 'boolean',
    ];
}
