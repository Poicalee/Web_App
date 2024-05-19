@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Timetable</h1>

        @if (count($timetable) > 0)
            <div class="schedule">
                @foreach ($timetable as $day => $dayEntries)
                    <h2>{{ $day }}</h2>
                    <ul>
                        @foreach ($dayEntries as $entry)
                            <li>
                                <span class="route">{{ $entry['route'] }}</span>
                                <span class="time">
                                    @if (isset($entry['departure_date']) && isset($entry['arrival_date']))
                                        {{ $entry['departure_date'] }} - {{ $entry['arrival_date'] }}
                                    @else
                                        Departure time unavailable
                                    @endif
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        @else
            <p>No bookings found. There are currently no upcoming journeys.</p>
        @endif
    </div>
@endsection

<style>
    /* Basic styling for improved schedule presentation */
    .schedule {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .schedule h2 {
        margin-bottom: 1rem;
    }

    .schedule ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .schedule li {
        margin-bottom: 0.5rem;
    }

    .route, .time {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        margin-right: 1rem;
    }

    .route {
        background-color: #f0f0f0;
    }

    .time {
        background-color: #e0e0e0;
    }
</style>
