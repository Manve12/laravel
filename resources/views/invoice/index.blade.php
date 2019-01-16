@extends('layout')

@section('content')
  <div class="container">
    @foreach ($invoices as $invoice)
    <div class="card">
      <div class="card-header">
        {{ $invoice->title }}
      </div>
      <div class="card-body">
        {{ $invoice->description }}
      </div>
      <div class="card-footer flex">
        <p>Invoice to: {{ $invoice->invoiced_to ? $invoice->invoiced_to->name : 'N/A' }}</p>
        <p class="ml-auto">£ {{ $invoice->amount }}</p>
        <div class="ml-auto">
          <a href="/invoices/{{ $invoice->id }}/edit" ><button class="btn btn-default">Edit</button></a>
          <a href="/invoices/{{ $invoice->id }}/delete"><button class="btn btn-danger">Delete</button></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
