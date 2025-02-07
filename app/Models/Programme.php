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

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'programme_trainer', 'programme_id', 'trainer_id');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'programme_speaker', 'programme_id', 'speaker_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'programme_category', 'programme_id', 'category_id');
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function promocodes()
    {
        return $this->hasMany(Promocode::class);
    }
}

