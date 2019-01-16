<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function store()
    {
      if (! auth()->user() ) return response('', 403);

      //create ticket with provided data
      $ticket = factory('App\Ticket')->create([
        'user_id' => request('user_id'),
        'title' => request('title'),
        'description' => request('description'),
        'complete' => function(){
          if (request('complete') == 0) return false;
          return true;
        },
        'priority' => request('priority')
      ]);

      $ticket->save();

      //if requests if for json
      if (request()->wantsJson())
      {
        return response('', 201);
      }

      //redirect to the ticket
      return redirect('/tickets/' . $ticket->id . '/replies');
    }

    public function update($id)
    {
      $ticket = Ticket::get()->find($id)->first();

      //if the authenticated users role is not moderator AND the ticket is closed
      if (auth()->user()->role != "moderator" && !! $ticket->complete === true) return response('', 403);

      //if the owner of the ticket or a moderator, update, else forbid
      if (auth()->id() == $ticket->user->id || auth()->user()->role == "moderator") {
        $ticket->complete = (int)!$ticket->complete;

        $ticket->save();
        return redirect('/tickets/'.$ticket->id.'/replies');
      }
      return response('', 403);
    }
}
