@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Stop</h1>
    <form action="{{ route('stops.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="day_id">Day</label>
            <select class="form-control" id="day_id" name="day_id" required>
                @foreach($days as $day)
                    <option value="{{ $day->id }}">{{ $day->date }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" required>
        </div>
        <button type="submit" class="btn my-btn text-white mt-2">Create Stop</button>
    </form>
</div>
@endsection
