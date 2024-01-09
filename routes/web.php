<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
 * Authenticated Users
 * */
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    /* ------------------------------------------------ */
    /*  ---------------- Instrument Routes ------------ */
    /*------------------------------------------------- */
    Route::get('/scheduler', [SchedulerController::class, 'index'])
        ->name('scheduler.index');
    Route::post('/scheduler', [SchedulerController::class, 'store'])->name('scheduler.store');
    
    Route::get('/messages', [MessagesController::class, 'index'])
        ->name('messages.index');
    Route::get('/attendance', [AttendanceController::class, 'index'])
        ->name('attendance.index');

    /* ------------------------------------------------ */
    /*  ---------------- Instrument Routes ------------ */
    /*------------------------------------------------- */
    Route::get('/instruments', [InstrumentController::class, 'getAll'])->name('instruments.all');
    Route::post('/instrument', [InstrumentController::class, 'store'])->name('instrument.store');
    Route::patch('/instrument', [InstrumentController::class, 'update'])->name('instrument.update');
    Route::delete('/instrument/{id}', [InstrumentController::class, 'destroy'])->name('instrument.destroy');

    /* ------------------------------------------------ */
    /*  ---------------- Profile Routes --------------- */
    /*------------------------------------------------- */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* ------------------------------------------------ */
    /*  ---------------- Menu Options --------------- */
    /*------------------------------------------------- */

    // Settings
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings.index');
});


require __DIR__.'/auth.php';
