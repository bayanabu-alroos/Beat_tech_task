<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['user_id',  'name_product', 'description','image' ];


    public function users(){
        return $this->belongsTo(User::class ,'user_id','id');
    }
}
