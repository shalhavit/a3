<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RenderController');

if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/inspector', 'InspectorController@getTwitterUserTimeline');

Route::get('/inspector', 'InspectorController@updateTwitterUserTimeline');

Route::post('tweet', ['as'=>'post.tweet','uses'=>'InspectorController@postNewTweet']);