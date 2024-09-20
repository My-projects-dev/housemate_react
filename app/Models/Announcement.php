<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['user_id','slug','status','country','language','type','home','title','address','home_type','floor','area','repair','room_count',
        'price','currency','duration','age_min','age_max','number_people','number_inhabitants','country_phone_code','phone','email','comment'];


    public $with = ['images', 'user'];

    protected $casts = [
        'created_at' => 'datetime:d M Y',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function images(): HasMany
    {
        return $this->hasMany(AnnouncementImage::class, 'announcement_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
