<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Ticket;

class TicketReply extends Model
{
  public function user(){
    return $this->belongsTo(User::class, 'user_id');
  }

  public function ticket()
  {
    return $this->belongsTo(Ticket::class, 'ticket_id');
  }
}
