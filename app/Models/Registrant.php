<?php

namespace App\Models;

use App\Models\Program_event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'regCode',
        'programCode',
        'user_id',
        'nric',
        'title',
        'firstName',
        'lastName',
        'address',
        'city',
        'postalCode',
        'email',
        'contactNumber',
        'extraFields',
        'paymentStatus',
        'paymentGateway',
        'price',
        'appliedPromoCode',
        'discountValue',
        'paymentReferenceNo',
        'regStatus',
        'emailStatus',
        'soft_delete',
    ];

    /**
     * Get the user that owns the Registrant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the events for the Registrant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Program_event::class, 'programCode', 'programCode');
    }

    // Add global scope to get only record that are not soft deleted
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('notDeleted', function (Builder $builder) {
            $builder->where('soft_delete', false);
        });
    }

}
