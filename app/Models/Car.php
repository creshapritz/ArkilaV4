<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'type', 'location', 'price_per_day', 'availability', 'image',
    ];

    protected $attributes = [
        'availability' => true, // Default to available
    ];

    protected $hidden = [
        'created_at', 'updated_at', // Optional: Hide timestamps
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('availability', true);
    }
}
