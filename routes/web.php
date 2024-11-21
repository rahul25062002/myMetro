<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MetroControlller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RazorpayController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
})->name('/')->middleware('firewall');

Route::get('/register',[RegisterController::class,'register'])->name('register')->middleware('firewall');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('firewall2');
Route::get('/admindashboard',[DashboardController::class,'admindashboard'])->name('admindashboard')->middleware('firewall2');
Route::get('/adminview',[DashboardController::class,'adminview'])->name('/adminview')->middleware('firewall2');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/signup',[RegisterController::class,'signup'])->name('signup');
Route::post('/registered',[DashboardController::class,'registered'])->name('registered');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/addmetroview',[MetroControlller::class,'addmetroview']);
Route::get('/edit/{id}',[MetroControlller::class,'edit']);
Route::get('/assigndriver/{id}',[MetroControlller::class,'assigndriver']);
Route::post('/update/{id}',[MetroControlller::class,'update']);
Route::post('/delete/{id}',[MetroControlller::class,'delete']);
Route::post('/addmetro',[MetroControlller::class,'addmetro']);
Route::get('/adddriverview',[MetroControlller::class,'adddriverview']);
Route::post('/adddriver',[MetroControlller::class,'adddriver']);
Route::get('/approvedriver',[DashboardController::class,'approvedriver']);
Route::post('/updatestatus/{id}',[MetroControlller::class,'updatestatus']);
Route::get('send-mail',[MailController::class,'index']);
Route::get('/driverdashboard',[DashboardController::class,'driverdashboard']);
Route::get('/bookmetro',[DashboardController::class,'bookmetro']);
Route::get('/addstation',[DashboardController::class,'addstation']);
Route::post('/addedstation',[DashboardController::class,'addedstation']);
Route::get('/showstation',[DashboardController::class,'showstation']);
Route::post('/bookticket',[DashboardController::class,'bookticket']);
Route::get('/trash',[DashboardController::class,'trash']);
Route::get('/restore/{id}',[DashboardController::class,'restore']);
Route::post('/permanentdelete/{id}',[DashboardController::class,'permanentdelete']);
Route::post('razorpay',[RazorpayController::class,'razorpay'])->name('razorpay');
Route::get('success/{id}',[RazorpayController::class,'success'])->name('success');
Route::get('cancel',[RazorpayController::class,'cancel'])->name('cancel');
Route::get('/paysuccessfull',[DashboardController::class,'paysuccessfull']);
Route::get('/bookmetronow/{id}',[MetroControlller::class,'bookmetronow']);
Route::post('/bookmetronow',[MetroControlller::class,'Booknow']);
Route::get('bookmetropay',[MetroControlller::class,'bookmetropay']);
