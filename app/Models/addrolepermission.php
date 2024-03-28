<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userrole;
use App\Models\permission;
use App\models\rolepermission;

class addrolepermission extends Model
{
    use HasFactory;
   

    public function userrole()
    {
        return $this->belongsTo(userrole::class);
    }


    public function permission()
    {
       return $this->belongsTo(permission::class);
    }

    public function rolepermission()
    {
       return $this->belongsTo(rolepermission::class);
    }

    
}
