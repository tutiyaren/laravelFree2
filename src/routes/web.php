<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Models\Calendar;

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

Route::get('/', [CalendarController::class, 'index'])->name('index');
Route::post('/events', [CalendarController::class, 'store']);
Route::put('/events/{id}', [CalendarController::class, 'update']);
Route::delete('/events/{id}', [CalendarController::class, 'destroy']);
