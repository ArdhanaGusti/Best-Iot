<?php

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', [ItemController::class, 'index'])->middleware('verified')->name('dashboard');
Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'create']);
});
Route::prefix('email')->group(function (){
    Route::get('/verify', [EmailController::class, 'verify'])->middleware('auth')->name('verification.notice');
    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
//Livewire component
Route::get('counter', Counter::class);

// Route::get('google',function(){
//     return view('googleAuth');
// });
Route::get('google/google', [AuthController::class, 'redirectToGoogle']);  
Route::get('google/callback', [AuthController::class, 'handleGoogleCallback']);
