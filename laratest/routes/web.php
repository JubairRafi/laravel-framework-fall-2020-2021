<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\homeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'verifyy']);
Route::get('/logout', [logoutController::class, 'index']);

Route::group(['middleware'=>['sess']],function(){
    Route::get('/home', [homeController::class, 'index']);
    Route::get('/userlist', [homeController::class, 'userlist'])->middleware('restrictF');

    Route::group(['middleware'=>['typeV']],function(){
        Route::get('/create', [homeController::class, 'create']);
        Route::post('/create', [homeController::class, 'store']);

        Route::get('/details/{id}', [homeController::class, 'show']);
    
        Route::get('/edit/{id}', [homeController::class, 'edit']);
        Route::post('/edit/{id}', [homeController::class, 'update']);
        
        Route::get('/delete/{id}', [homeController::class, 'delete']);
        Route::post('/delete/{id}', [homeController::class, 'destroy']);
    });
    

});



