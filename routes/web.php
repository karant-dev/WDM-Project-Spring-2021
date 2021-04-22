<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/admindashboard', function () {
    return view('admindashboard');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/immigrants', function () {
    return view('immigrants');
});

Route::get('/indexadm', function () {
    return view('indexADM');
});

Route::get('/indexSadm', function () {
    return view('indexSadm');
});

Route::get('/superadmin', function () {
    return view('superadmin');
});

Route::get('/visitors', function () {
    return view('visitors');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

