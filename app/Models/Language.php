<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_phone_code',
        'country',
        'language',
        'lang_code',
        'flag_class',
        'view',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
