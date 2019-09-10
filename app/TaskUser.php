<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
  protected $fillable = [
    'user_id',
    'task_id',
    'started_at',
    'stopped_at'
  ];

  public function task()
  {
    return $this->belongsTo('App\Task');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
