<?php

namespace App\Jobs;

use App\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Thujohn\Twitter\Facades\Twitter;

class CalculateTweetReach implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tweet;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $retweets =  Twitter::getRts($this->tweet->tweet_id,['format'=>'object']);

        $flowers = 0;

        foreach ($retweets as $retweet)
        {
            $flowers += $retweet->user->followers_count;
        }

        $this->tweet->tweet_reach = $flowers;
        $this->tweet->save();

        $this->tweet->dispatchJob();

    }
}
