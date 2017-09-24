@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tweet Details</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Tweet URL</th>
                                <th>Tweet ID</th>
                                <th>Tweet Reach</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $tweet->user->name }}</td>
                                <td>{{ $tweet->tweet_url }}</td>
                                <td>{{ $tweet->tweet_id }}</td>
                                <td>{{ $tweet->tweet_reach }}</td>
                                <td>
                                    <a href="{{ route('tweet.show',['id'=>$tweet->id]) }}">
                                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
