<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userrole;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class userrolemapping extends Model
{
    use HasFactory;
    public $table = 'userrolemapping';
    protected $fillable = ['role_id,user_id'];
    protected $primaryKey = 'id';
   
     public function user()
     {
    //     return $this->hasMany(User::class,'user_id');
            return $this->belongsTo(user::class,'user_id');
     }

    public function userrole()
    {
        //return $this->hasMany(userrole::class,'id');
        return $this->belongsTo(userrole::class,'role_id');
    }
   
}
