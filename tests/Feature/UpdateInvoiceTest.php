<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateInvoiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function moderator_can_update_invoice()
    {
      //given we have a moderator
      $this->signIn(factory('App\User')->create(['role'=>'moderator']));
      //and an invoice
      $invoice = factory('App\Invoice')->create([
        'title'=>'Invoice #1 Title',
        'description'=>'Invoice #1 Description'
      ]);

      //moderator should be able to update invoice
      $this->patch('invoices/' . $invoice->id . '/edit', ['title' => 'Updated Title', 'description' => 'Updated Description'])
           ->assertRedirect('invoices/' . $invoice->id);

      //check if the invoice was updated
      $this->get('invoices/' . $invoice->id)
           ->assertSee('Updated Title')
           ->assertSee('Updated Description');
    }

    /** @test */
    public function non_moderators_can_not_update_invoice()
    {
      //given we have a member
      $this->signIn(factory('App\User')->create());

      //and an invoice which was created by a moderator
      $invoice = factory('App\Invoice')->create([
        'title'=>'Invoice #1 Title',
        'description'=>'Invoice #1 Description',
        'user_id' => factory('App\User')->create(['role'=>'moderator'])->id
      ]);

      $this->patch('invoices/'.$invoice->id.'/edit', ['title' => 'updating title'])
           ->assertStatus(403);
    }
}
