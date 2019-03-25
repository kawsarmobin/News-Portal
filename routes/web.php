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

Route::get('/', 'Frontend\HomeController@index');

Auth::routes();

Route::group(['middleware' => ['auth', 'is_admin']], function () {
    /* Dashboard */
    Route::get('/dashboard', 'HomeController@index')->name('home');
    /* About */
    Route::resource('/about', 'Admin\Footer\AboutsController')->only(['create', 'store']);
    /* Terms */
    Route::resource('/terms', 'Admin\Footer\TermsController')->only(['create', 'store']);
    /* Privacy */
    Route::resource('/privacy', 'Admin\Footer\PrivaciesController')->only(['create', 'store']);
});

Route::group(['middleware' => ['auth']], function () {
    /* Own Topics */
    Route::resource('/topics', 'Frontend\TopicsController');
    /* Topic Follows */
    Route::get('/topic/{topic_id}/follow', 'Frontend\TopicFollowsController@follow')->name('topic.follows.follow');
    /* Own Post */
    Route::resource('/own-posts', 'Frontend\PostsController');
    Route::get('/collect-link/{own_post}', 'Frontend\PostsController@link')->name('own-posts.link');
    Route::get('/posts-link-list', 'Frontend\PostsController@post_link')->name('own-posts.post_link');
});
/* Topic Follows */
Route::get('/all-topic', 'Frontend\TopicFollowsController@index')->name('topic.follows.index');



