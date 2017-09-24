<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;

class TweetController extends Controller
{

   public function index()
   {
       $tweets = Tweet::where('user_id',auth()->id())->with('user')->paginate(10);

       return view('tweet.index',compact('tweets'));
   }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('tweet.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tweetUrl'=>'required|url'
        ]);


        $tweetId =  basename($request->tweetUrl);

        $tweet = Tweet::where('tweet_id',$tweetId)->first();

        if(empty($tweet))
        {
            $retweets =  Twitter::getRts($tweetId,['format'=>'object']);

            $flowers = 0;

            foreach ($retweets as $retweet)
            {
                $flowers += $retweet->user->followers_count;
            }

            $tweet = new Tweet();
            $tweet->user_id = auth()->id();
            $tweet->tweet_url = $request->tweetUrl;
            $tweet->tweet_id = $tweetId;
            $tweet->tweet_reach = $flowers;
            $tweet->save();

            $tweet->dispatchJob();


        }



        return view('tweet.show',compact('tweet'));

    }

    public function show($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('tweet.show',compact('tweet'));


    }

}
