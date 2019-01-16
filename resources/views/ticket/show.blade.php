@extends('layout')

@section('content')
  @foreach($ticket->replies as $reply)
    <h4>{{ $reply->description }}</h4>
  @endforeach
@endsectionphp
