<?php

use \App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\incident\IncidentController;
use App\Http\Controllers\service\ServiceCompanieController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserTrashedController;

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


Route::group(['middleware' => "role:admin,user"], function(){
    # SERVICES
    Route::get('/services',[ServiceController::class, 'index'])->name('services.index')->middleware('auth');
    Route::get('/services/companies',[ServiceCompanieController::class,'index'])->name('servicecompanies.index')->middleware('auth');
    Route::get('/services/companies/create',[ServiceCompanieController::class,'create'])->name('servicecompanies.create')->middleware('auth');
    Route::post('/services/companies',[ServiceCompanieController::class,'store'])->name('servicecompanies.store')->middleware('auth');
    Route::delete('/services/companies/{companie}',[ServiceCompanieController::class,'destroy'])->name('servicecompanies.destroy')->middleware('auth');

    # INCIDENTS
    Route::get('/incidents/{selectIdService}/create', [IncidentController::class, 'create'])->name('incident.create')->middleware('auth');
    Route::resource('incidents',IncidentController::class)->names('incidents')->middleware('auth');

    # USERS
    Route::get('/users',[UserController::class,'index'])->name('users.index')->middleware('auth');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy')->middleware('auth');
    Route::get('/users/trashed',[UserTrashedController::class,'index'])->name('userstrashed.index')->middleware('auth');
    Route::put('/users/trashed/{user}',[UserTrashedController::class, 'restore'])->name('userstrashed.restore')->middleware('auth');
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


Route::get('/send-mail', function () {
   
    $details = [
        'title' => 'MI TITULO PRUEBA',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('adrianonel78@gmail.com')->queue(new MyTestMail($details));
   
    dd("Email is Sent.");
});