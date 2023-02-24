<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DataTraffic\DataTrafficApiController;
use App\Models\info_traffic;


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

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::post('registerfirebase', [ApiController::class, 'registerfirebase']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
});

// Data Traffic API
Route::get('/traffic', [DataTrafficApiController::class, 'index']);
Route::post('/traffic', [DataTrafficApiController::class, 'store']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
