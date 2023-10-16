<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;
use App\Http\Controllers\Auth\RegsterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\RolesAndPermissionController;

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

Route::middleware('SetAppLang')->prefix('{locale}')->group(
    function () {
        Route::post('register',[RegsterController::class,'register']);
        Route::post('login',[LoginController::class,'login']);
    }
);

Route::middleware('auth:sanctum','SetAppLang')->prefix('{locale}')
->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', [JWTAuthController::class, 'logout']);
});

Route::middleware('auth:sanctum','SetAppLang')->prefix('{locale}/admin')
->group(function(){
    Route::resource('role-permission', RolesAndPermissionController::class);

});