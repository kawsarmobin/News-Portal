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
    // Profile
    Route::resource('/admin/profile', 'Admin\Profile\ProfilesController',['as' => 'admin'])->only(['index','store']);
    Route::get('/admin/profile/update', 'Admin\Profile\ProfilesController@updateProfile')->name('admin.profile.update');
    // change password
    Route::get('/admin/profile/change-password', 'Admin\Profile\ProfilesController@change_password')->name('admin.profile.change-password');
    Route::post('/admin/profile/change-password', 'Admin\Profile\ProfilesController@update_password')->name('admin.profile.update-password');
    /* Topic delete topic */
    Route::resource('/admin/topics', 'Admin\Topic\TopicsController',['as' => 'admin'])->only(['index', 'destroy']);
    /* Post delete permission */
    Route::resource('admin/posts', 'Admin\Post\PostsController',['as' => 'admin'])->only(['index', 'show','destroy']);
    /* User permission */
    Route::resource('admin/users', 'Admin\User\UsersController',['as' => 'admin'])->only(['index','destroy']);
    Route::get('admin/users/{user}/status', 'Admin\User\UsersController@status')->name('admin.users.status');
    Route::get('admin/users/{user}/role', 'Admin\User\UsersController@userRole')->name('admin.users.role');
});

Route::group(['middleware' => ['auth']], function () {
    /* Own Topics */
    Route::resource('/topics', 'Frontend\TopicsController');
    /* Topic Follows */
    Route::get('/topic/{topic_id}/follow', 'Frontend\TopicFollowsController@follow')->name('topic.follows.follow');
    /* Own Post */
    Route::resource('/own-posts', 'Frontend\PostsController');
    /* Posts link */
    Route::get('/collect-link/{own_post}', 'Frontend\PostsController@link')->name('own-posts.link');
    Route::get('/posts-link-list', 'Frontend\PostsController@post_link')->name('own-posts.post_link');
    // Profile
    Route::resource('/profile', 'Profile\ProfilesController')->only(['index','store']);
    Route::get('/profile/update', 'Profile\ProfilesController@updateProfile')->name('profile.update');
    // change password
    Route::get('/profile/change-password', 'Profile\ProfilesController@change_password')->name('profile.change-password');
    Route::post('/profile/change-password', 'Profile\ProfilesController@update_password')->name('profile.update-password');
});

/* Home */
Route::get('/', 'Frontend\HomeController@index');
/* Posts archive */
Route::get('/archives', 'Frontend\ArchivesController@index')->name('archives.index');
/* Post single page */
Route::get('/post/{token}', 'Frontend\HomeController@singlePage')->name('post.single.page');
/* Topic Follows */
Route::get('/all-topic', 'Frontend\TopicFollowsController@index')->name('topic.follows.index');
/* Topic wise posts */
Route::get('/topic/{slug}/posts', 'Frontend\HomeController@postsByTopic')->name('topic.posts');
/* Home archive */
Route::get('/archive', 'Frontend\HomeController@archiveData')->name('home.archive');
/* Vote */
Route::post('/vote/{post_id}', 'Vote\VotesController@vote')->name('vote');