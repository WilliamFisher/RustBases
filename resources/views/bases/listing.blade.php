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
							@if(Auth::check() && Auth::user()->id == $base->user_id)
							<li>
								<a data-toggle="tab" href="#edit">Edit</a>
							</li>
							@endif
						</ul>

						<div class="tab-content">
							<div id="info" class="tab-pane fade in active">
								<h4>Description</h4>
								<p>{{ $base->shortdescription }}</p>
								<br>
								<p>{{ $base->description }}</p>
								<br>
								<h4>PasteBin Url</h4>
								<p><a href="{{ $base->pastebin }}">{{ $base->pastebin }}</a></p>
							</div>
							@if(Auth::check() && Auth::user()->id == $base->user_id)
							<div id="edit" class="tab-pane fade">
								<h4>Edit</h4>
								<form method="POST" class="form-horizontal" action="{{ url('bases/' .$base->id) }}">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					                    <label class="col-md-4 control-label">Title</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" name="title" value="{{ $base->title }}">
					                        @if ($errors->has('title'))
					                            <span class="help-block">
					                                <strong>{{ $errors->first('title') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>
					                <div class="form-group{{ $errors->has('shortdescription') ? ' has-error' : '' }}">
					                    <label class="col-md-4 control-label">Short Description</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" name="shortdescription" value="{{ $base->shortdescription }}">
					                        @if ($errors->has('shortdescription'))
					                            <span class="help-block">
					                                <strong>{{ $errors->first('shortdescription') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>
					                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					                    <label class="col-md-4 control-label">Description</label>
					                    <div class="col-md-6">
					                        <textarea class="form-control" name="description" rows="4" cols="10">{{ $base->description }}</textarea>
					                        @if ($errors->has('description'))
					                            <span class="help-block">
					                                <strong>{{ $errors->first('description') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>
					                <div class="form-group{{ $errors->has('imageurl') ? ' has-error' : '' }}">
					                    <label class="col-md-4 control-label">Thumbnail URL</label>
					                    <div class="col-md-6">
					                        <input type="text" class="form-control" name="imageurl" value="{{ $base->imageurl }}">
					                        @if ($errors->has('imageurl'))
					                            <span class="help-block">
					                                <strong>{{ $errors->first('imageurl') }}</strong>
					                            </span>
					                        @endif
					                    </div>
					                </div>
					                <div class="form-group">
					                    <div class="col-md-6 col-md-offset-4">
					                        <button type="submit" class="btn btn-primary">
					                            <i class="fa fa-btn fa-edit"></i>Edit
					                        </button>
					                    </div>
					                </div>
								</form>

								<form method="POST" class="form-horizontal" action="{{ url('bases/' .$base->id) }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" id="delete-base-{{ $base->id }}" class="btn btn-danger">
                                    			<i class="fa fa-btn fa-trash"></i>Delete
                                			</button>
                                		</div>
                                	</div>
								</form>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection