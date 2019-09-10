<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
    'name',
  ];

  public function description()
  {
    return $this->hasMany('App\Project');
  }
}
