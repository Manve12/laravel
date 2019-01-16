<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\Task;
use App\Invoice;

class StaffController extends Controller
{
    public function index()
    {
      $query_tickets = Ticket::all();
      $tickets = [
        'open' => $query_tickets->where('complete', false)->count(),
        'closed' => $query_tickets->where('complete', true)->count(),
        'total' => $query_tickets->count(),
        'oldest' => Ticket::oldest()->where('assigned_user_id',null)->take(3)->get(),
        'all_open' => $query_tickets->where('complete', false),
        'all_closed' => $query_tickets->where('complete', true)
      ];

      $query_tasks = Task::all();
      $tasks = [
        'open' => $query_tasks->where('complete', false)->count(),
        'closed' => $query_tasks->where('complete', true)->count(),
        'total' => $query_tasks->count(),
        'personal_open' => $query_tasks->where('user_id', auth()->id())->where('complete', false)->count(),
        'personal_closed' => $query_tasks->where('user_id', auth()->id())->where('complete', true)->count(),
        'oldest' => Task::oldest()->where('complete', false)->where('assigned_user_id', auth()->id())->take(3)->get(),
        'all_open' => $query_tasks->where('assigned_user_id', auth()->id())->where('complete', false),
        'all_closed' => $query_tasks->where('assigned_user_id', auth()->id())->where('complete', true)
      ];

      $query_invoices = Invoice::all();
      $invoices = [
        'amount' => $query_invoices->sum('amount'),
        'total' => $query_invoices->count(),
        'average' => ($query_invoices->sum('amount') / ($query_invoices->count() ? $query_invoices->count() : 1) ),
        'paid' => $query_invoices->where('paid', true),
        'unpaid' => $query_invoices->where('paid', false)
      ];

      return view('staff', compact('tickets', 'tasks', 'invoices'));
    }
}
