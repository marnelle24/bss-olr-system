<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'name', 
        'slug', 
        'email', 
        'about', 
        'socials', 
        'is_active',
        'profession',
        'thumbnail'
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany( App\Models\Program_event::class,
            'trainer_program_items',
            'programCode',
            'trainer_id',     
            'programCode' 
        );
    }

    protected $casts = [
        'socials' => 'array'
    ];

    public function programmes()
    {
        return $this->belongsToMany(Programme::class);
    }
}
