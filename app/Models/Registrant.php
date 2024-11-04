<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'paymentReferenceNo',
        'regStatus',
        'emailStatus',
        'soft_delete',
    ];
}
