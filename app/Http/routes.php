<?php

/*
|--------------------------------------------------------------------------
| アプリケーションのルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのルートを全て登録することが可能です。
| 簡単です。ただ、Laravelへ対応するURIと、そのURIがリクエスト
| されたときに呼び出されるコントローラーを指定してください。
|
*/

/*
 * Auth 認証
 */
Route::auth();

/*
 * Home 情報.
 */
Route::get('/', 'HomeController@index');
Route::delete('{id}', 'HomeController@destroy');

/*
 * Minutes 情報.
 */
// Route::get('minutes/register', 'MinutesController@register');
// Route::post('minutes/register', 'MinutesController@create');
Route::resource('minutes', 'MinutesController');
// Route::get('minutes/{id}', 'MinutesController@show');
