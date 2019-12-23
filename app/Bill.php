<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  protected $fillable = [
     'user_id', 'status', 'bill_total',
  ];

  //relations
  public function order(){
    return $this->hasOne('App\Order');
}
  public function user(){
    return $this->belongsTo('App\User', 'user_id');
}
}
