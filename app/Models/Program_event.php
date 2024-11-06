<?php

namespace App\Models;

use App\Models\User;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program_event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'partner_id', 
        'program_id', 
        'type', 
        'programCode', 
        'title', 
        'startDate', 
        'endDate', 
        'startTime', 
        'endTime', 
        'activeUntil', 
        'customDate', 
        'venue', 
        'latLong', 
        'price', 
        'adminFee', 
        'thumb', 
        'a3_poster', 
        'excerpt', 
        'description', 
        'contactNumber', 
        'contactPerson', 
        'contactEmail', 
        'chequeCode', 
        'limit', 
        'settings', 
        'extraFields', 
        'searchable', 
        'publishable', 
        'private_only', 
        'soft_delete', 
        'status'
    ];

    /**
     * Get the user that owns the Program_event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the program that owns the Program_event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the partner that owns the Program_event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

}
