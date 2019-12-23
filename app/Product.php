<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'category_id', 'product_name', 'product_description', 'product_img', 'price', 'product_quantity',
  ];

  //relations
  public function category(){
    return $this->belongsTo('App\Category', 'category_id');
}

  public function order(){
    return $this->hasMany('App\Order','id');
}

}
