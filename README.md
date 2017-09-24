# Tweet Reach Counter
**This Small application take the tweet link and calculate the tweet Reach**
## Installation
First clone this repository

` git clone https://github.com/sayemk/tweetreachcounter.git `

**Then run**
` composer install` 

` npm install `

**Now adjust the configuration in your environ file `.env` and add the following variable**

`TWITTER_CONSUMER_KEY=`

`TWITTER_CONSUMER_SECRET=`

`TWITTER_ACCESS_TOKEN=`

`TWITTER_ACCESS_TOKEN_SECRET=`


**Configure your laravel queue driver according to [Laravel Queue Documentation](https://laravel.com/docs/5.5/queues) ** 
In my case I had used **database driver**.
You can keep running you queue manager by running this command
 
 `php artisan queue:work --queue=tweet --tries=3`
 
Or can configure **supervisor**.

