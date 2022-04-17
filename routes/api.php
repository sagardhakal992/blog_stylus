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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware'=>'auth:sanctum'],function (){

    Route::group(['prefix'=>"category"],function (){
        Route::post("/store",[\App\Http\Controllers\Category\CategoryController::class,'store']);
        Route::delete('/{category}',[\App\Http\Controllers\Category\CategoryController::class,'delete']);
    });

    Route::group(['prefix'=>'blogs'],function (){
        Route::post('/store',[\App\Http\Controllers\Blogs\BlogController::class,'store']);
        Route::delete('/delete/{blog}',[\App\Http\Controllers\Blogs\BlogController::class,'delete']);
    });

});



