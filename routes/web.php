<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Middleware\LoginCheck;





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

Route::get('/register',[RegisteredUserController::class,'create']);
Route::get('/login', [AuthenticatedController::class, 'getlogin']);

//Auth::routes();
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[AttendanceController::class,'index'])->middleware(LoginCheck::class);
Route::post('/login',[AuthenticatedController::class, 'login']);
Route::get('/logout',[AuthenticatedController::class,'logout'])->middleware(LoginCheck::class);
Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/attendance/job_start',[AttendanceController::class,'startJob'])->middleware(LoginCheck::class);
Route::post('/attendance/job_end', [AttendanceController::class, 'endJob'])->middleware(LoginCheck::class);
Route::post('/attendance/break_start', [AttendanceController::class, 'startBreak'])->middleware(LoginCheck::class);
Route::post('attendance/break_end',[AttendanceController::class, 'endBreak'])->middleware(LoginCheck::class);
Route::get('attendance/attendance_list',[AttendanceController::class,'getAttendanceList'],)->middleware(LoginCheck::class);



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


/*require __DIR__.'/auth.php';*/
