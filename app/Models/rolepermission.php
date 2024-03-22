<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userrole;
use App\Models\permission;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\SoftDeletes;

class rolepermission extends Model
{
    use HasFactory;
    //use SoftDeletes;
    public $table = 'rolepermission';

    public function permission()
    {
   //     return $this->hasMany(User::class,'user_id');
           return $this->belongsTo(permission::class,'permission_id');
    }

   public function userrole()
   {
       //return $this->hasMany(userrole::class,'id');
       return $this->belongsTo(userrole::class,'role_id');
   }
}
