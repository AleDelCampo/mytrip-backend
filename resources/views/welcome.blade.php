@extends('layouts.app')

@section('content')
    <!-- Main Jumbotron -->
    <div class="jumbotron text-center text-white py-5 my-bg">
        <div class="container   ">
            <h1 class="display-4">Welcome to MyTrips</h1>
            <p class="lead">Plan and share your amazing trips with ease!!</p>
        </div>
    </div>

    <!-- Additional Content -->
    <div class="container mt-5 my-light-bg">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Plan Your Trip</h5>
                        <p class="card-text">Create detailed itineraries and organize your adventures.</p>
                        <a href="{{ route('trips.create') }}" class="btn my-btn text-white">Create Trip</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Discover New Destinations</h5>
                        <p class="card-text">Explore trips planned by others and get inspired.</p>
                        <a href="{{ route('trips.index') }}" class="btn my-btn text-white">View Trips</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Share Your Experience</h5>
                        <p class="card-text">Document and share your trip experiences with the community.</p>
                        <a href="#" class="btn my-btn text-white">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
