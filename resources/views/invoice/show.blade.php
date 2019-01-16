@extends('layout')

@section('content')
  <h1>{{ $invoice->title }}</h1>
  <h4>{{ $invoice->description }}</h4>
@endsection
