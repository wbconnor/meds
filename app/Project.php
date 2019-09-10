<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
    'name',
    'description',
    'user_id',
    'customer_id'
  ];

  public function customer()
  {
    return $this->belongsTo('App\Customer');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
