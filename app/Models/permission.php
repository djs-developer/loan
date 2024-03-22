<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class permission extends Model
{
    use HasFactory;
    public $table = 'permission';
    protected $fillable = ['permission'];

    public function rolepermission(): BelongsTo
    {
        //return $this->belongsTo('userrolemapping','role_id');
        return $this->hasMany(rolepermission::class,'permission_id');
    }
}
