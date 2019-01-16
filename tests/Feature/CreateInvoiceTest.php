<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Invoice;

class CreateInvoiceTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $invoice;

    public function setUp()
    {
      parent::setUp();
      //create a new user
      $this->user = factory("App\User")->create();
      //sign the user in
      $this->signIn($this->user);
      //create an invoice
      $this->invoice = factory('App\Invoice')->create(['user_id' => $this->user->id]);
    }

    /** @test */
    public function non_moderators_can_not_create_invoices()
    {
      $this->post('/invoices', $this->invoice->toArray())->assertStatus(403);
    }

    /** @test */
    public function moderators_can_create_invoices()
    {
      //assign moderator role to the created user
      $this->user->role = 'moderator';

      //create a new invoice with user id linking to the created user
      $invoice = factory('App\Invoice')->create([
        'title' => 'Title',
        'description' => 'Description'
      ]);

     // get the invoice from /invoices/{invoice}
     // tests to see if an invoice can be found
      $this->get("invoices/" . $invoice->id)
           ->assertSee('Title')
           ->assertSee('Description');
    }

    /** @test */
    public function moderators_can_delete_invoices()
    {
      //assign moderator role to the created user
      $this->user->role = 'moderator';

      //create a new invoice with user id linking to the created user
      $invoice = factory('App\Invoice')->create([
        'title' => 'Title',
        'description' => 'Description'
      ]);

      //delete the invoice
      $this->delete('/invoices/' . $invoice->id . '/delete', $invoice->toArray())
           ->assertRedirect('/invoices')
           ->assertStatus(302);
    }

    /** @test */
    public function non_moderators_can_not_delete_invoices()
    {
      //status code of 403 should be given when trying to delete invoice
      $this->delete('/invoices/1/delete')
           ->assertStatus(403);
    }
}
