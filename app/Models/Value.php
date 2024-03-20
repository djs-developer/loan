<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Value extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'date_value',
        'integer_value',
        'string_value',
        'timestamp_value',
    
        'column_name',
        'custom_attribute_id',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(person::class);
    }

    public function customAttribute(): BelongsTo
    {
        return $this->belongsTo(CustomAttribute::class);
    }
}
