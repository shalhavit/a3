<?php

namespace App\Http\Controllers;

class TwitterController extends BaseController
{
    use Mbarwick83\TwitterApi\TwitterApi;

    public function __construct(TwitterApi $twitter) {
        $this->twitter = $twitter;
    }

}