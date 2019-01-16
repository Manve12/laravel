@extends('layout')

@section('content')
<div class="container">
    <div class="form-group">
      <h3>Support</h3>
    </div>
    <form action="/tickets" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
      <div class="form-group">
        <label for="title">Title: </label>
        <input type="text" class="form-control" name="title" id="title" required>
      </div>
      <div class="form-group">
        <label for="priority">Priority:</label>
        <select class="form-control" name="priority">
          <option selected>Low</option>
          <option>Medium</option>
          <option>High</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description: </label>
        <textarea class="form-control" id="description" name="description" rows="8" rquired></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
@endsection
