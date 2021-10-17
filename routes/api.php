<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Route::resource('/users', AuthController::class);

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Api',
    'prefix' => 'v1'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::resource('users', 'AuthController');

    // clone auth api
    // Route::middleware('auth:api')->group(function () {
    //     Route::resource('users', 'PostController');
    // });

    /** php artisan makeL:resource PostResource */
    /**
     * in class PostResource on function toArray()
     * return [
     *      'id' => $this->id,
     *      'title' => $this->title,
     *      'body' => $this->body,
     *      'created_at' => $this->created_at,
     * ]
     * in PostController on function index()
     * return PostResource::collection(Post::all());
     */

});
