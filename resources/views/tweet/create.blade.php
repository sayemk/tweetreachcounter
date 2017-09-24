@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Tweet URL</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('tweet.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('tweetUrl') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Tweet URL</label>

                                    <div class="col-md-6">
                                        <input id="name" type="url" class="form-control" name="tweetUrl" value="{{ old('tweetUrl') }}" required autofocus>

                                        @if ($errors->has('tweetUrl'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tweetUrl') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                        <a href="{{ route('tweet.index') }}" class="btn btn-default">
                                             Back
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
