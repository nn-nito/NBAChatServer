<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::group(['middleware' => 'version'], function () {
//	// サーバーチェック
//	Route::get('/check', 'ServerCheckController@check')->name('check');
//});
Route::get('/check', 'ServerCheckController@check')->name('check')->middleware('version');
// ユーザー登録
Route::post('/user', 'UserSignUpController@signUp')->name('sign_up');
// ユーザー更新
Route::post('/user/update', 'UserUpdateController@update')->name('user_update');
// チャット書き込み
Route::post('/chat', 'ChatController@write')->name('chat_write');
// チャット取得
Route::get('/chat', 'ChatController@get')->name('chat_get');
// チャットすべて取得
Route::get('/chat/all', 'ChatController@getAll')->name('chat_get_all');
//// 放送中のラジオすべて取得
//Route::get('/on_air', 'OnAirController@getAll')->name('on_air_get_all');
//// ラジオを検索し取得
//Route::get('search', 'SearchController@get')->name('search_radio');
//// ラジオ局すべて取得
//Route::get('/radio_station', 'RadioStationController@getAll')->name('radio_station_get_all');
//// お気に入りのラジオすべて取得
//Route::get('/user_favorite_radio', 'UserFavoriteRadioController@userFavoriteRadios')->name('user_favorite_radios');
//// お気に入りのラジオ追加
//Route::post('/user_favorite_radio', 'UserFavoriteRadioController@create')->name('user_favorite_radio_create');
//// お気に入りのラジオ削除
//Route::post('/user_favorite_radio/delete', 'UserFavoriteRadioController@delete')->name('user_favorite_radio_delete');

// NBA
// 指定されたスケジュールすべて取得
Route::get('/schedule', 'ScheduleController@schedule')->name('schedule');
// 指定された日時で試合中のスケジュールを取得
Route::get('/during_schedule', 'ScheduleController@duringSchedule')->name('during_schedule');
