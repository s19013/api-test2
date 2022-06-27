<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('member')->group(function(){
    Route::post  ('/create', [MemberController::class, 'memberCreate']);
    Route::get   ('/{id}', [MemberController::class, 'getMember']);
    Route::get   ('/', [MemberController::class, 'getAllMembers']);
    Route::put   ('/update', [MemberController::class, 'update']);
    Route::delete('/delete/{id}', [MemberController::class, 'delete']);
});

