@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>
    <form action="{{ route('bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="route_id">Route</label>
            <select class="form-control" id="route_id" name="route_id" required>
                @foreach($routes as $route)
                    <option value="{{ $route->id }}" {{ $booking->route_id == $route->id ? 'selected' : '' }}>{{ $route->start_point }} - {{ $route->end_point }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="datetime-local" class="form-control" id="booking_date" name="booking_date" value="{{ $booking->booking_date->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
