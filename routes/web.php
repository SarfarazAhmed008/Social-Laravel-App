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

//Route::get('/', [
//    'uses' => 'UserController@getIndex'
//    'as' => 'index'
//]);

Route::group(['middleware' => ['web']], function(){
    Route::get('/', [
        'uses' => 'UserController@getIndex',
        'as' => 'index'
    ]);
    Route::post('/signup', [
       'uses' => 'UserController@postSignUp',
       'as' => 'sign-up'
    ]);
    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'sign-in'
    ]);

    Route::get('/account', [
       'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);
    Route::post('/updateaccount', [
       'uses' => 'UserController@postUpdateAccount',
       'as' => 'account.update'
    ]);
    Route::get('/userimage/{filename}', [
       'uses' => 'UserController@getUserImage',
       'as' => 'account.image'
    ]);


    Route::get('/dashboard', [
        'uses' => 'StatusController@getDashboard',
        'as' => 'dashboard'
    ]);
    Route::group(['prefix' => 'dashboard'], function (){
        Route::post('/create-status', [
            'uses' => 'StatusController@postCreateStatus',
            'as' => 'create.status'
        ]);
        Route::get('/delete-status/{status_id}', [
            'uses' => 'StatusController@getDeleteStatus',
            'as' => 'delete.status'
        ]);
        Route::get('/logout', [
           'uses' => 'StatusController@getLogout',
           'as' => 'logout'
        ]);
//        Route::post('/edit', function (\Illuminate\Http\Request $request){
//            return response()->json(['message' => $request['body']]);
//        })->name('edit');

        Route::post('/edit', [
           'uses' => 'StatusController@postEditStatus',
           'as' => 'edit'
        ]);

        Route::post('/likepost', [
           'uses' => 'StatusController@postLikeStatus',
           'as' => 'like'
        ]);
    });
});
