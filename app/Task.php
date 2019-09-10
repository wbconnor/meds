<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'description',
    'user_id',
    'project_id'
  ];

  public function project()
  {
    return $this->belongsTo('App\Project');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function timer()
  {
    return $this->hasMany('App\TaskUser');
    //->withPivot(['fields']);
  }
}
