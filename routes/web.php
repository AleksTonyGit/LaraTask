<?php


Route::get('/','ListController@showAll')
    ->name('list'); /*Страница с таблицей всех тасков (http://localhost/laratask/public/index.php/list)*/

Route::get('list/create', 'ListController@create'); /*Страница с добавлением таска (http://localhost/laratask/public/index.php/list/create)*/

Route::post('list', 'ListController@store'); /*Обработка добавления таска и возврат на страницу с таблицей*/

Route::post('check', 'ListController@postIndex')
    ->name('check');

Route::get('list/comment/{id}', 'ListController@showTask')
->name('comment');

Route::post('list/comment', 'ListController@storeComment');


Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/redirectG', 'SocialAuthGoogleController@redirect');
Route::get('/callbackG', 'SocialAuthGoogleController@callback');


Route::get('/home', 'HomeController@index')->name('home');

