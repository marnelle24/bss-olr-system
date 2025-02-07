<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
            'name', 
            'slug'
        ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the events for the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany( App\Models\Program_event::class,
            'category_program_items',
            'programCode',
            'category_id',     
            'programCode' 
        );
    }

    public function programmes()
    {
        return $this->belongsToMany(Programme::class, 'programme_category', 'category_id', 'programme_id');
    }
}
