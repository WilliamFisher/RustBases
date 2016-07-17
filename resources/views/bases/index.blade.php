@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Browse Bases</div>
                <div class="panel-body">
                @foreach($bases as $base)
                    <div class="col-md-4">
                        <div class="featured-listing">
                            <a href="{{ url('bases', [$base->id]) }}">
                                <img class="featured-thumbnail" src="/img/bacon.jpg">
                            </a>
                            <div class="overlay">
                                <p class="listing-name">{{ $base->title }}</p>
                                <p class="listing-votes">{{ $base->view_count }} Votes</p>
                                <a class="listing-author" href="#">{{ App\User::find($base->user_id)->name }}</a>
                                <p class="listing-date">Created {{ Carbon\Carbon::now()->diffForHumans(Carbon\Carbon::parse($base->created_at), true) }} ago</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection