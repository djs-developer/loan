<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\state;
use Illuminate\Database\Eloquent\SoftDeletes;

class city extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'city';
    protected $fillable = ['cityname'];
    protected $primaryKey = 'id';

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates  = ['deleted_at'];

    public function state()
    {
        return $this->hasOne(state::class,'id','state_id');
    }
   
}
