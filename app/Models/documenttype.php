<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class documenttype extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'documenttype';
    protected $fillable = ['docname'];
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates  = ['deleted_at'];
}
