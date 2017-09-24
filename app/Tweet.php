<?php

namespace App;

use App\Jobs\CalculateTweetReach;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function dispatchJob()
    {
        CalculateTweetReach::dispatch($this)
            ->delay(Carbon::now()->addHour(2))
            ->onQueue('tweet');

    }
}
