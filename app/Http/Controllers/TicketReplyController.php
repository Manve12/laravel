<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;

class TicketReplyController extends Controller
{
    public function index(Ticket $ticket)
    {
      return view('ticket.index', compact('ticket'));
    }

    public function store($id)
    {
      //create and store a new reply
      $reply = factory('App\TicketReply')->create([
        'ticket_id' => $id,
        'user_id' => request('user_id'),
        'description' => request('description')
      ]);

      $reply->save();
      // if requested json, return a response
      if (request()->wantsJson()) return response($reply, 201);
      // else redirect to the replies
      return redirect('/tickets/' . $reply->ticket->id . '/replies');
    }
}
