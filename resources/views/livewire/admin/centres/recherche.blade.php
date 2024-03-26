<!-- resources/views/centres/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Search Centre d'Inscription</h2>
                <form action="{{ route('centres.search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="query" placeholder="Enter search query">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        @if(isset($centres) && $centres->count() > 0)
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">
                    <h3>Search Results</h3>
                    <ul class="list-group">
                        @foreach($centres as $centre)
                            <li class="list-group-item">{{ $centre->name }}</li>
                            <!-- Display other details of the centre as needed -->
                        @endforeach
                    </ul>
                </div>
            </div>
        @elseif(isset($centres) && $centres->count() == 0)
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">
                    <p>No results found.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
