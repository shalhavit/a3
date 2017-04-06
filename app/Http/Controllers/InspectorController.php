<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;
use File;

class InspectorController extends Controller {

    /**
     * Post a new tweet to the user account.
     *
     * @return void
     */
    public function postNewTweet(Request $request) {
    	$this->validate($request, [
            'tweet' => 'required'
        ]);

    	$newTweet = ['status' => $request->tweet];

        // Load images
    	if(!empty($request->images)) {
    		foreach ($request->images as $key => $value) {
    			$img_uploaded = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    			if(!empty($img_uploaded)){
                    $newTweet['media_ids'][$img_uploaded->media_id_string] = $img_uploaded->media_id_string;
                }
    		}
    	}

    	$twitter = Twitter::postTweet($newTweet);
    	return back();
    }

	/**
     * get the user twitter timeline.
     *
     * @return view
     */
    public function getTwitterUserTimeline($count = 12) {
    	$data = Twitter::getUserTimeline(['count' => $count, 'format' => 'array']);
    	return view('inspector', compact('data'));
    }

}
