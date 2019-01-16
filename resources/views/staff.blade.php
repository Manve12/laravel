@extends('layout')

@section('header')
  <link rel="stylesheet" href="/css/staff.css">
@endsection

@section('content')
      <handler
        tickets="{{ json_encode($tickets) }}"
        invoices="{{ json_encode($invoices) }}"
        tasks="{{ json_encode($tasks) }}">
      </handler>
@endsection
