<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetails extends Model
{
    use HasFactory;
    public $table = 'userdetails';
    protected $fillable = [
         'name',
         'value',
        // 'user_id'
        'date',
        'mobile',
        'address',
    ];


    // public function scopeWithCustomAttributes(Builder $query)
    // {
    //     $query = DB::table('userdetails')->get();
    //     /** @var Collection<CustomAttribute> $attributes */
    //     $attributes = userdetails::all();

    //     $selects = [];
    //     // Build the select list: the header of the query result will have
    //     // the list of fields (ids) and the values will be located at the same level.
    //     // as result we will have in one row all the values of the person.
    //     foreach ($attributes as $attribute) {
    //         // Select the value for the associate field and the current record (current record in the context of the query)
    //         $selects[] = "(SELECT {$attribute->date_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->date}";
    //         $selects[] = "(SELECT {$attribute->mobile_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->mobile}";
    //         $selects[] = "(SELECT {$attribute->address_value} FROM values where custom_attribute_id = {$attribute->id} and values.user_id = users.id) as {$attribute->address}";
    //     }

    //     $selects = implode(',', $selects);
    //     $query->selectRaw("{$selects}");
    // }

    public function user()
    {
        //return $this->hasMany(userrole::class,'id');
        return $this->belongsTo(User::class,'user_id');
    }
    
}
