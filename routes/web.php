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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::group(['middleware' => ['web']], function () {
  Route::get('/create','ArticlesController@create');          //新規
  Route::post('/store','ArticlesController@store');           //新規保存
  Route::get('/edit/{id}','ArticlesController@edit');         //編集
  Route::delete('/delete/{id}','ArticlesController@destroy'); //削除
  Route::get('/{id}','ArticlesController@show');              //詳細
  Route::get('/','ArticlesController@index');                 //一覧
});
*/
Route::group(['middleware' => ['web']], function () {
  Route::get('/create','PlansController@create');          //新規
  Route::post('/store','PlansController@store');           //新規保存
  Route::get('/edit/{plan_id}','PlansController@edit');         //編集
  Route::delete('/delete/{plan_id}','PlansController@destroy'); //削除
  Route::get('/{plan_id}','PlansController@show');              //詳細
  Route::get('/','PlansController@index');                 //一覧
});
