<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AuthController;



Route::post('/create',[AuthController::class,'createUser'])->name('createUser');
Route::post('/login',[AuthController::class,'loginUser'])->name('loginUser');;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::middleware('example')->get('/',[ExampleController::class, 'index']);
Route::get('/no-access',[ExampleController::class, 'noAccess'])->name('no-access');

/*
//por grupos
Route::middleware('example','admin','auth' )->group(function(){
    Route::get('/',[ExampleController::class, 'index']);
    Route::get('/',[ExampleController::class, 'index']);
    Route::get('/',[ExampleController::class, 'index'])->withoutMiddleware('admin');
    Route::get('/',[ExampleController::class, 'index']);
    Route::get('/',[ExampleController::class, 'index']);
    Route::get('/',[ExampleController::class, 'index']);
});
*/