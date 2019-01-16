<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\Invoice;

class PortalController extends Controller
{
    public function index()
    {
      $tickets = Ticket::get()->where('assigned_user_id',auth()->id());
      $invoices = Invoice::get()->where('invoiced_user_id',auth()->id());

      return view('portal.index', compact('tickets', 'invoices'));
    }
}
