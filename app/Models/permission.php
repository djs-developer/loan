<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class permission extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'permission';
    protected $fillable = ['permission'];

    protected $dates  = ['deleted_at'];

    public function rolepermission(): BelongsTo
    {
        //return $this->belongsTo('userrolemapping','role_id');
        return $this->hasMany(rolepermission::class,'permission_id');
    }
}
