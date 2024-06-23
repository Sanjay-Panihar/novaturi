<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'event_name',
        'listed_by',
        'venue',
        'date',
        'time',
        'event_details',
        'terms_conditions',
        'booking_price',
        'phone',
        'email',
        'event_category',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
        'banner' // Include this field if it's part of your data
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\EvenCategory', 'id');
    }
}