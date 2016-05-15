@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Browse Bases</div>

                <div class="panel-body">
                    @foreach ($bases as $base)
                        <h4>{{ $base->title }}</h4>
                        <ul>
                            <li><img src={{ $base->imageurl }}></li>
                            <li>{{ $base->shortdescription }}</li>
                        </ul>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection