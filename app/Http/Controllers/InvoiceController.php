<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
      //if logged in but no privileges, redirect to root
      if (auth()->user()->role !== "moderator") return redirect('/');

      //retrieve all invoices
      $invoices = Invoice::get();

      //send invoices to invoice index view
      return view('invoice.index', compact('invoices'));
    }

    public function store()
    {
      // if not a moderator, respond back with 403
      if (auth()->user()->role != "moderator") return response('', 403);

      //validate the data passed through
      request()->validate([
        'title' => 'required',
        'description' => 'required'
      ]);

      //create a new invoice with authorised user id
      $invoice = Invoice::create([
        'title' => request('title'),
        'description' => request('description'),
        'user_id' => auth()->user()->id,
        'amount' => request('amount')
      ]);

      // if requested json, return the invoice and a status code of 201
      if (request()->wantsJson())
      {
        return response($invoice, 201);
      }

      // if not json, redirect to home page
      return redirect("/invoices/" . $invoice->id);
    }

    //display invoice
    public function show(Invoice $invoice)
    {
      //check if user is logged in
      if (! auth()->user()) return redirect('/login');

      // if user is a moderator or the invoiced user
      if (auth()->user()->role === "moderator" ||
          $invoice->invoiced_user_id == auth()->id()) {
        return view('invoice.show', compact('invoice'));
      } else {
         return response('Unauthorized', 403);
      }
    }

    //update invoice
    public function update($id)
    {
      //don't allow anyone to edit invoice unless a moderator
      if (auth()->user()->role !== "moderator") return response('', 403);

      $invoice = Invoice::get()->find($id);

      $invoice->title = request('title');
      $invoice->description = request('description');
      $invoice->invoiced_user_id = request('invoiced_user_id');
      $invoice->amount = request('amount') ?: 0; // set to the amount given or if null, set to 0

      $invoice->save();

      return redirect('/invoices/' . $id);
    }

    public function destroy($id)
    {
      //don't allow anyone to delete invoice unless a moderator
      if (auth()->user()->role !== "moderator") return response('', 403);

      //get the invoice and delete it
      Invoice::find((int)$id)->first()->delete();

      //redirect back to invoices
      return redirect('/invoices');
    }
}
