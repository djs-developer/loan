<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documenttype extends Model
{
    use HasFactory;
    public $table = 'documenttype';
    protected $fillable = ['docname'];
}
