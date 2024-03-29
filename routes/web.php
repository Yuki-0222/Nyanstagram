<?php

Route::get('/', 'PhotosController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザー機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('likes', 'UsersController@likes')->name('users.likes');
    });
    
    Route::group(['prefix' => 'photos/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
        Route::resource('comments', 'CommentsController', ['only' => ['store']]);
        Route::get('like_users', 'PhotosController@like_users')->name('photos.like_users');
    });
    
    Route::resource('photos', 'PhotosController', ['only' => ['index', 'store', 'destroy', 'create', 'show']]);
});