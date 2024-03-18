<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\state;
class city extends Model
{
    use HasFactory;
    public $table = 'city';
    //protected $fillable = ['cityname'];
   // protected $fillable = ['state_id']
}
