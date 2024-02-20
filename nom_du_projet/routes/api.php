<?php

use App\Events\feedback;
use App\Events\StartVideoChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\Hello;
use App\Events\warning;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\VideoChatController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

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
Route::post("/broadcast",function(){
    broadcast(new Hello(request('name'),request('message'),request('id')));
    return 'ok event use';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Broadcast::routes(['middleware' => ['auth:api']]);
Route::middleware('auth:api')->group(function () {
    Route::get('/get-user', [AuthController::class, 'userInfo']);
    Route::get('/allusers', [AuthController::class, 'allusers']);

    Route::post('/video-chat', function () {
        $user = User::find(2);
        broadcast(new StartVideoChat($user, request('signal')));
        return request('signal');
    });

    Route::post('/feedback', function () {
        broadcast(new feedback(request('signal'), request('emetteur')));
        return request('emetteur');
    });

    Route::post("/warning",function(){
        $user = User::find(request('id'));
        broadcast(new warning(request('name'), $user, request('signal'), Auth::user() ));
        return 'ok event use';
    });
    
    // Endpoints to call or receive calls.
    Route::post('/video/call-user', [VideoChatController::class, 'callUser']);
    Route::post('/video/accept-call', [VideoChatController::class, 'acceptCall']);

});
