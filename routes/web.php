<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AttendanceController;




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
Route::get('/login', [AuthenticatedController::class, 'getlogin']);
Route::get('/register',[RegisteredUserController::class,'create']);

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[AttendanceController::class,'index']);
Route::post('/login',[AuthenticatedController::class, 'login']);
Route::get('/logout',[AuthenticatedController::class,'logout']);
Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/attendance/job_start',[AttendanceController::class,'startJob']);
Route::post('/attendance/job_end', [AttendanceController::class, 'endJob']);
Route::post('/attendance/break_start', [AttendanceController::class, 'startBreak']);
Route::post('attendance/break_end',[AttendanceController::class, 'endBreak']);



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


/*require __DIR__.'/auth.php';*/
