<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\TicketReply;

class Ticket extends Model
{
  protected $guarded = [];

  protected $with = ['replies'];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function replies()
  {
    return $this->hasMany(TicketReply::class)->oldest();
  }
}
