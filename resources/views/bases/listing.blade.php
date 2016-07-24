@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">View Base</div>
				<div class="panel-body">
					<div class="col-md-4">
						<div class="featured-listing">
							<img class="featured-thumbnail" src="{{ $base->imageurl }}">
						</div>
					</div>
					<div class="col-md-8">
						<div class="page-header">
							<h3 class="section-title">{{ $base->title }}</h3>
						</div>
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#info">Info</a>
							</li>
							<li>
								<a data-toggle="tab" href="#edit">Edit</a>
							</li>
						</ul>

						<div class="tab-content">
							<div id="info" class="tab-pane fade in active">
								<h4>Description</h4>
								<p>{{ $base->shortdescription }}</p>
								<br>
								<p>{{ $base->description }}</p>
							</div>
							<div id="edit" class="tab-pane fade">
								<h4>Edit</h4>
								<p>This is where you will edit the base or delete it.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection