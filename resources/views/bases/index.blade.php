@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Browse Bases</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>View Count</th>
                                <th>Title</th>
                                <th>User_ID</th>
                                <th>Short Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bases as $base)
                            <tr>
                                <td>{{ $base->view_count }}</td>
                                <td>{{ $base->title }}</td>
                                <td>{{ $base->user_id }}</td>
                                <td>{{ $base->shortdescription }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection