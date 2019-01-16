<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
      parent::setUp();
      //create staff user
      $this->user = $this->signIn(factory('App\User')->create(['role' => 'staff']));
    }

    /** @test */
    public function staff_can_create_tasks()
    {
      // create task
      $task = factory('App\Task')->create(['user_id' => auth()->id()]);
      
      $this->postJson('/tasks', $task->toArray())
           ->assertStatus(201)
           ->assertSee($task->title)
           ->assertSee($task->description);
    }

    /** @test */
    public function non_authorised_staff_can_not_create_tasks()
    {
      //given we have a random user
      $this->signIn(factory('App\User')->create(['role' => 'member']));
      //should not be able to post to /tasks
      $this->postJson('/tasks')
           ->assertStatus(403);
    }

    /** @test */
    public function staff_can_close_tasks()
    {
      //given there is a task
      $task = factory('App\Task')->create(['user_id' => auth()->id(), 'complete' => false]);
      //staff can close it
      $this->patch('/tasks/' . $task->id . '/complete')
           ->assertRedirect('/tasks/' . $task->id);
    }

    /** @test */
    public function staff_can_reopen_tasks()
    {
      //given there is a task
      $task = factory('App\Task')->create(['user_id' => auth()->id(), 'complete' => true]);
      //staff can reopen it
      $this->patch('/tasks/' . $task->id . '/complete')
           ->assertRedirect('/tasks/' . $task->id);
    }

    /** @test */
    public function staff_can_edit_tasks()
    {
      //given we have a task
      $task = factory('App\Task')->create(['user_id' => auth()->id()]);
      //update task details
      $this->patch('/tasks/'. $task->id .'/edit', ['title' => 'Title', 'description' => 'Description'])
           ->assertRedirect('/tasks/' . $task->id);
      //check if the visible data is correct
      $this->get('/tasks/'. $task->id)
           ->assertSee('Title')
           ->assertSee('Description');
    }

    /** @test */
    public function moderators_can_delete_tasks()
    {
      //given a moderator is signed in
      $this->signIn(factory('App\User')->create(['role' => 'moderator']));
      //and a task exists
      $task = factory('App\Task')->create(['user_id' => auth()->id()]);
      //delete the task
      $this->delete('/tasks/' . $task->id . '/delete')
           ->assertRedirect('/tasks');
    }

    /** @test */
    public function non_moderators_can_not_delete_tasks()
    {
      //forbid delete of task if staff (currently signed in due to setUp)
      $this->delete('/tasks/1/delete')
           ->assertStatus(403);
      //sign in a normal user
      $this->signIn(factory('App\User')->create(['role' => 'member']));
      //forbid delete
      $this->delete('/tasks/1/delete')
           ->assertStatus(403);
    }
}
