<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function (\Illuminate\Contracts\Routing\Registrar $api) {

    $api->post('/admin-register', [UserController::class, 'store']);

    $api->post('/login', [AuthController::class, 'login']);

});
Route::middleware('auth:api')->prefix('v1')->group(function (\Illuminate\Contracts\Routing\Registrar $api) {
    $api->resource('/articles', ArticleController::class);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
