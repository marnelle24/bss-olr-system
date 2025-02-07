<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'arrangement',
        'counter',
        'createdBy'
    ];

    protected $casts = [
        'isActive' => 'boolean',
    ];

    /**
     * Get the program items for the promotion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Program_event::class, 'programCode', 'programCode');
    }

    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class);
    }
}
