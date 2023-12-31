<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\LoginwithFacebookController;
use App\Http\Controllers\LinkedinController;
use App\Http\Controllers\OnetomanyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('polyonetomany', [OnetomanyController::class, 'getPotmPostCommentVideos'])->name('polyonetomany');
    Route::get('postcomments', [OnetomanyController::class, 'postcomments'])->name('postcomments');
    Route::get('posttags', [OnetomanyController::class, 'posttags'])->name('posttags');
    Route::get('postimages', [OnetomanyController::class, 'postimages'])->name('postimages');
    
    Route::get('videocomments', [OnetomanyController::class, 'videocomments'])->name('videocomments');
    Route::get('videotags', [OnetomanyController::class, 'videotags'])->name('videotags');
    Route::get('notificationview', function () {
    return view('notifications');
    })->name('notificationview');
    Route::get('sendevent', function () {
    event(new App\Events\StatusLiked(Auth::user()->name,Auth::user()->id));
    return "Event has been sent!";
    });
    Route::get('email-test', function(){
  
    $details['email'] = 'hariharan.sulur@gmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
    dd('done');
});
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(LoginWithGoogleController::class)->group(function(){
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});

Route::get('auth/facebook', [LoginwithFacebookController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [LoginwithFacebookController::class, 'loginWithFacebookUser']);

Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);


