@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Route</h1>
    <form action="{{ route('routes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_point">Start Point</label>
            <input type="text" class="form-control" id="start_point" name="start_point" required>
        </div>
        <div class="form-group">
            <label for="end_point">End Point</label>
            <input type="text" class="form-control" id="end_point" name="end_point" required>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure Time</label>
            <input type="time" class="form-control" id="departure_time" name="departure_time" required>
        </div>
        <div class="form-group">
            <label for="arrival_time">Arrival Time</label>
            <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
