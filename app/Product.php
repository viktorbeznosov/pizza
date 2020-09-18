<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('name', 'description', 'price', 'hot', 'image','cat_id');
}
