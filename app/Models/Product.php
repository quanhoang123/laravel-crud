<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable  = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit','new'];

    public $timestamp = false;
    
    public function cate()
    {
        return $this->belongsTo('App\TypeProduct','id_type','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment' );
    }
}
