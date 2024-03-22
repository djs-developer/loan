<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\userrolemapping;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class userrole extends Model
{
    use HasFactory;
    public $table = 'userrole';
    protected $fillable = ['role'];
    protected $primaryKey = 'id';
    
    public function userrolemapping(): BelongsTo
    {
        //return $this->belongsTo('userrolemapping','role_id');
        return $this->hasMany(userrolemapping::class,'role_id');
    }

    public function rolepermission(): BelongsTo
    {
        //return $this->belongsTo('userrolemapping','role_id');
        return $this->hasMany(rolepermission::class,'role_id');
    }
}
