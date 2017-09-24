@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Tweets
                        <a class="btn btn-primary pull-right btn-sm" href="{{ route('tweet.create') }}">Add New Tweet</a>
                    </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Tweet URL</th>
                                <th>Tweet ID</th>
                                <th>Tweet Reach</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tweets as $tweet)
                                <tr>

                                    <td><a href="{{ $tweet->tweet_url }}" target="_blank">{{ $tweet->tweet_url }}</a></td>
                                    <td>{{ $tweet->tweet_id }}</td>
                                    <td>{{ $tweet->tweet_reach }}</td>
                                    <td>
                                        <a href="{{ route('tweet.show',['id'=>$tweet->id]) }}">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $tweets->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
