@extends('layout')

@section('content')
  <h1>{{ $task->title }}</h1>
  <h3>{{ $task->description }}</h3>
@endsection
