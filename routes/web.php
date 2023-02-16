<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactnosMailable;
use Illuminate\Support\Facades\Mail;
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


Route::get('contactanos', function () {
    $correo = new ContactnosMailable;
    Mail::to('andylc33@gmail.com')->send($correo);
    return 'mensaje enviado';
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('email-test', function(){
    $details['email'] = 'andylc33@gmail.com';
    dispatch(new App\Jobs\SendEmailJob($details));
    dd('done');
    });