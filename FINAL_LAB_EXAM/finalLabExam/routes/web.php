<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logoutController;

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
    Route::get('/home', [homeController::class, 'index'])->name('home.index');
    Route::get('/employeelist', [homeController::class, 'employeelist'])->name('home.employeelist')->middleware('resFeature');
    Route::get('/productlist', [homeController::class, 'productlist'])->name('home.productlist')->middleware('resFeature');

    Route::group(['middleware'=>['resType']],function(){
        Route::get('/create', [homeController::class, 'create'])->name('home.create');
        Route::post('/create', [homeController::class, 'store']);

        Route::get('/details/{id}', [homeController::class, 'show']);
    
        Route::get('/edit/{id}', [homeController::class, 'edit'])->name('home.edit');
        Route::post('/edit/{id}', [homeController::class, 'update']);
        
        Route::get('/delete/{id}', [homeController::class, 'delete'])->name('home.delete');
        Route::post('/delete/{id}', [homeController::class, 'destroy']);
    });
    

});
