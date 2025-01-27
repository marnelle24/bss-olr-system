<?php

namespace App\Models;

use App\Models\User;
use App\Models\Program_event;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partner extends Model
{
    use HasFactory;

    use HasSlug;

    protected $fillable = [
        'name',          
        'slug',          
        'bio',           
        'contactPerson', 
        'contactNumber', 
        'contactEmail',  
        'websiteUrl',    
        'publishabled',  
        'searcheable',   
        'approvedBy',    
        'status',        
        'requestedBy'  
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * The user that belong to the Partner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'partner_user', 'user_id', 'partner_id');
    }

    /**
     * Get all of the program_events for the Partner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events(): BelongsTo
    {
        return $this->belongsTo(Program_event::class);
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}
