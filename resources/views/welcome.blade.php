@extends('layouts.app')

@section('content')
<div class="wrapper">
        <div class="container">
            <div class="motto">
                <h1>Rust Bases</h1>
                <h3>Welcome to a collection of base designs for Rust.</h3>
                <br>
                <a href="{{ url('/bases') }}" class="btn">Browse Bases</a>
                <a href="mailto:lavishgamingcommunity@gmail.com" class="btn">Make a Suggestion</a>
            </div>
        </div>
</div>
@endsection
