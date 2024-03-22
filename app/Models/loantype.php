<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class loantype extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'loantype';
    protected $fillable = ['loanname'];

    protected $dates  = ['deleted_at'];
}
