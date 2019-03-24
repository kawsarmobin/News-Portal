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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    /* About */
    Route::resource('/about', 'Admin\Footer\AboutsController');
    /* Terms */
    Route::resource('/terms', 'Admin\Footer\TermsController');
    /* Privacy */
    Route::resource('/privacy', 'Admin\Footer\PrivaciesController');
    /* Own Topics */
    Route::resource('/topics', 'Frontend\TopicsController');
    /* Topic Follows */
    Route::get('/topic/{topic_id}/follow', 'Frontend\TopicFollowsController@follow')->name('topic.follows.follow');
    /* Own Post */
    Route::resource('/own-posts', 'Frontend\PostsController');
});
/* Topic Follows */
Route::get('/all-topic', 'Frontend\TopicFollowsController@index')->name('topic.follows.index');



