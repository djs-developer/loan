<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\state;
class city extends Model
{
    use HasFactory;
    public $table = 'city';
    protected $fillable = ['cityname'];
    protected $primaryKey = 'id';

    public function state()
    {
        return $this->hasOne(state::class,'id','state_id');
    }
   
}
