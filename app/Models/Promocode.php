<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promocode extends Model
{
    use HasFactory;

    protected $fillable = [
        'programCode',
        'promocode',
        'startDate',
        'endDate',
        'price',
        'maxUses',
        'usedCount',
        'isActive',
        'createdBy'
    ];

    protected $casts = [
        'isActive' => 'boolean',
    ];

    /**
     * Get the program items for the promocode
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programItems(): BelongsTo
    {
        return $this->belongsTo(Program_event::class, 'programCode', 'programCode');
    }

    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class);
    }
}
