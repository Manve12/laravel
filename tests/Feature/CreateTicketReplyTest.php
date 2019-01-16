<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTicketReplyTest extends TestCase
{
  use DatabaseMigrations;

  /** @test */
  public function authenticated_user_can_add_a_reply()
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
    //leave a reply
    $this->postJson('/tickets/' . $ticket->id . '/reply', $reply->toArray())
         ->assertStatus(201);
  }
}
