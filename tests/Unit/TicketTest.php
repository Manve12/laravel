<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TicketTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_ticket_can_have_replies()
    {
      //given we have an authenticated user
      $user = factory('App\User')->create();
      $this->signIn($user);
      //and a ticket
      $ticket = factory('App\Ticket')->create();
      //and a reply
      $reply = factory('App\TicketReply')->create(['ticket_id' => $ticket->id,
                                                  'user_id' => $user->id,
                                                  'description' => 'New Reply']);

      $this->get('/tickets/' . $ticket->id . '/replies')
           ->assertSee('New Reply');
    }
}
