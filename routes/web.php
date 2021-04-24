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

Route::get('admindashboard', function () {
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

Route::get('/onboarding', function () {
    return view('onboarding');
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

Route::get('/deleteThings', function () {
    return view('deleteThings');
});

Route::get('/immigrantdet', function () {
    return view('immigrantdet');
});

Route::get('/school', function () {
    return view('school');
});

Route::get('/hospital', function () {
    return view('hospital');
});


// User Auth
Route::post('/signup_user', 'App\Http\Controllers\SignupController@store');
Route::post('/login_user', 'App\Http\Controllers\LoginController@index');
Route::get('/logout', 'App\Http\Controllers\PageController@logout');

// User CRUD
Route::get('/userdelete/{user_id}', 'App\Http\Controllers\SignupController@destroy');
Route::post('/adduser', 'App\Http\Controllers\SignupController@store');
Route::get('/users', 'App\Http\Controllers\SignupController@showusers');

// School Hospital CRUD
Route::get('/schools', 'App\Http\Controllers\SignupController@showschools');
Route::get('/hospitals', 'App\Http\Controllers\SignupController@showhospitals');
Route::post('/addschool', 'App\Http\Controllers\SchoolsController@store');
Route::post('/addhospital', 'App\Http\Controllers\HospitalsController@store');


?>

