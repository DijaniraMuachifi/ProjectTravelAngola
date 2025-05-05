<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory ;

    protected $fillable = [
        'name', 'location', 'type', 'main_image', 'stars',
        'price_per_night', 'amenities', 'featured'
    ];

    // Acessor para converter amenities em array
    public function getAmenitiesArrayAttribute()
    {
        return explode(',', $this->amenities);
    }
}
