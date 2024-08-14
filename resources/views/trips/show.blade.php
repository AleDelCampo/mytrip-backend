<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Trip</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <h1>Trip Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $trip->title }}</h5>
                <p class="card-text">{{ $trip->description }}</p>
                <p class="card-text"><small class="text-muted">Date: {{ $trip->date }}</small></p>
            </div>
        </div>
        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>