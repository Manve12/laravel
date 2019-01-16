<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class InvoiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function moderators_can_view_all_invoices()
    {
      //create a new user with role of moderator and sign them in
      $this->signIn(factory('App\User')->create(['role' => 'moderator']));

      //create a new invoice
      $invoice = factory('App\Invoice')->create([
        'title' => 'Title',
        'description' => 'Description'
      ]);

      //check if moderator can view invoices
      $this->get('/invoices')
           ->assertSee('Title')
           ->assertSee('Description');
    }

    /** @test */
    public function non_moderators_can_not_view_all_invoices()
    {
      $this->signIn(factory('App\User')->create());

      $this->get('/invoices')
           ->assertStatus(302)
           ->assertRedirect('/');
    }

    /** @test */
    public function not_logged_in_users_can_not_view_invoices()
    {
      //mock up an invoice
      $invoice = factory('App\Invoice')->create();

      //try to retrieve the invoice and check if the user is redirected
      $this->get("/invoices/" . $invoice->id)
           ->assertStatus(302)
           ->assertRedirect('/login');
    }
}
