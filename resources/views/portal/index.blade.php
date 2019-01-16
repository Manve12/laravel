@extends('layout')

@section('head')
  <link rel="stylesheet" href="/css/portal.css">
@endsection

@section('content')
  <div class="fluid-container">
    <div class="signed-in r-bc">
      Welcome to your portal, <span>{{ auth()->user()->name }}</span>.
      <div class="signed-in-wrapper">
        <form method="post" action="/logout">
          @csrf
          <button type="submit">Logout</button>
        </form>
        @if (auth()->user()->role != "member")
          <a href="/staff" class="staff-signed-in"><button type="button">Staff Portal</button></a>
        @endif
      </div>
    </div>

    <div class="line"></div>
      <div class="middle-title">
        Tickets ({{$tickets->count()}})
        <button type="button" class="toggle-button uppercase r-bc" data-toggle="collapse" data-target="#portal_ticket_menu" aria-expanded="false" aria-controls="portal_ticket_menu">Toggle</button></div>
    <div class="line"></div>

    <div class="collapse" id="portal_ticket_menu">
      <div class="support-wrapper">
          @if($tickets->count() > 0)
            @foreach($tickets as $ticket)
            <div class="ticket card r-bc">
              <h5 class="card-header">{{$ticket->title}}</h5>
              <div class="ticket-description card-body">{{ $ticket->description }}</div>
              <div class="card-footer portal-card-footer">
                <a href="/tickets/{{ $ticket->id }}/replies">View Ticket</a>
                <div class="ticket-status">{{ $ticket->complete ? 'Closed' : 'Open' }}</div>
                <div class="ticket-replies">
                  Replies: {{ $ticket->replies()->count() }}
                </div>
              </div>
            </div>
            @endforeach
          @else
            <p class="no-items">You have not created a ticket yet.</p>
          @endif
      </div>
    </div>

    <div class="line"></div>
      <div class="middle-title">Invoices ({{$invoices->count()}}) <button type="button" class="toggle-button uppercase r-bc" data-toggle="collapse" data-target="#portal_invoice_menu" aria-expanded="false" aria-controls="portal_invoice_menu">Toggle</button></div>
    <div class="line"></div>

    <div class="collapse" id="portal_invoice_menu">
      <div class="invoice-wrapper">
        @if ($invoices->count() > 0)
          @foreach($invoices as $invoice)
          <div class="invoice card">
            <h5 class="card-header r-bc">{{$invoice->title}}</h5>
            <div class="invoice-description card-body r-bc">{{ $invoice->description }}</div>
            <div class="card-footer portal-card-footer">
              <a href="/invoices/{{ $invoice->id }}" class="r-bc">View Invoice</a>
              <div class="invoice-status r-bc">{{ $invoice->paid ? 'Paid' : 'Unpaid' }}</div>
              <div class="invoice-amount r-bc">
                Amount: £{{ $invoice->amount }}
              </div>
            </div>
          </div>
          @endforeach
        @else
          <p class="no-items">There currently are no invoices.</p>
        @endif
      </div>
    </div>

  </div>
@endsection
