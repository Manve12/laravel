<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTicketTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_a_ticket()
    {
      //given we have a user
      $this->signIn(factory('App\User')->create());

      //and a ticket
      $ticket = factory('App\Ticket')->create();

      //a user can create a ticket
      $this->postJson('/tickets', $ticket->toArray())
           ->assertStatus(201);
    }

    /** @test */
    public function unauthenticated_user_may_not_create_a_ticket()
    {
      $this->withExceptionHandling();
      //create a ticket
      $ticket = factory('App\Ticket')->create(['user_id' => factory('App\User')->create()]);
      //try to store the ticket
      $this->postJson('/tickets', $ticket->toArray())
           ->assertStatus(401);
    }

    /** @test */
    public function a_user_can_close_ticket()
    {
      //given we have a user
      $user = factory('App\User')->create();
      $this->signIn($user);

      //and a ticket
      $ticket = factory('App\Ticket')->create(['user_id' => $user->id]);

      //close the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
           ->assertRedirect('/tickets/' . $ticket->id);
    }

    /** @test */
    public function a_moderator_can_close_ticket()
    {
      // given we have a moderator
      $user = factory('App\User')->create(['role' => 'moderator']);
      $this->signIn($user);
      // and a ticket
      $ticket = factory('App\Ticket')->create(['user_id'=>$user->id]);
      // close the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
           ->assertRedirect('/tickets/' . $ticket->id);
    }

    /** @test */
    public function unauthorised_user_may_not_close_ticket()
    {
      //given we have a signed in user
      $this->signIn(factory('App\User')->create());

      //and a ticket created by someone else
      $ticket = factory('App\Ticket')->create(['user_id' => factory('App\User')->create()->id]);

      //forbid the closure of the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
           ->assertStatus(403);
    }

    /** @test */
    public function a_moderator_can_reopen_ticket()
    {
      // given we have a moderator
      $user = factory('App\User')->create(['role' => 'moderator']);
      $this->signIn($user);
      // and a closed ticket
      $ticket = factory('App\Ticket')->create(['user_id' => factory('App\User')->create()->id, 'complete' => '1']);
      // open the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
           ->assertRedirect('/tickets/' . $ticket->id);
    }

    /** @test */
    public function users_can_not_reopen_tickets()
    {
      // given we have a user
      $user = factory('App\User')->create();
      $this->signIn($user);

      // and a closed ticket - created by the signed in user
      $ticket = factory('App\Ticket')->create(['user_id' => $user->id, 'complete' => '1']);
      // forbid opening the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
           ->assertStatus(403);

      // a closed ticket - created by someone else
      $ticket = factory('App\Ticket')->create(['user_id' => factory('App\User')->create()->id, 'complete' => '1']);
      // forbid opening the ticket
      $this->patch('/tickets/' . $ticket->id . '/complete')
          ->assertStatus(403);
    }
}
