@extends('layout')

@section('content')
<div class="page-wrapper">
  <h1 class="page-title">
    @if ($ticket->complete)
      <i class="fas fa-lock"></i>
    @else
      <i class="fas fa-lock-open"></i>
    @endif
     {{$ticket->title}}
    <form class="ml-auto close-form" action="/tickets/{{$ticket->id}}/complete" method="POST">
      @csrf
      {{ method_field('PATCH') }}
      @if (auth()->user()->role != 'member')
      <div>
        <button type="submit">{{($ticket->complete) ? 'Open' : 'Close'}}</button>
      </div>
      @endif
    </form>
  </h1>
  <h3 class="page-description">{{$ticket->description}}</h3>
  <h1 class="page-title page-reply-title">Replies</h1>
  @foreach ($ticket->replies as $reply)
    <div class="page-reply-wrapper">
      <div class="page-reply-header">
        <p>{{ $reply->user->name }} replied ({{ $reply->created_at }}):</p>
      </div>
      <h4 class="page-reply-description">{{ $reply->description }}</h4>
    </div>
  @endforeach
  @if (! $ticket->complete)
  <div class="page-form">
    <form class="form-group" action="/tickets/{{ $ticket->id }}/reply" method="post">
      <p class="r-bc">Write a reply:</p>
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->id() }}">
      <textarea class="form-control" name="description" rows="8" placeholder="Enter your reply..."></textarea>
      <button class="form-control" type="submit">Submit Reply</button>
    </form>
  </div>
  @endif
</div>
@endsection
