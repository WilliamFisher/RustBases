@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Base</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/bases') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" maxlength="25" value="{{ old('title') }}">
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
                                <input type="text" class="form-control" name="shortdescription" maxlength="140" value="{{ old('shortdescription') }}">
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
                                <textarea class="form-control" name="description" rows="4" cols="10"></textarea>
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
                                <input type="text" class="form-control" name="imageurl" value="{{ old('imageurl') }}">
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
                                    <i class="fa fa-btn fa-edit"></i>Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection