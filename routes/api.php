<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// デフォルトで"api/~"とprefixがついてしまうため、これを付けない設定に変更している
// app/Providers/RouteServiceProvider.php
//   -> mapApiRoutes
Route::group([
	'middleware' => 'api',
	'prefix' => '{view_type}/api',
], function() {
    Route::resource('createtree', 'Api\CreateTreesController', ['only' => 'store']);
});
