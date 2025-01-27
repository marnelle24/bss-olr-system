<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Programme extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('soft_delete', false);
            $builder->where('status', 'active');
            $builder->where('publishable', true);
            $builder->where('searchable', true);
            $builder->where('private_only', false);
        });
    }


    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}

