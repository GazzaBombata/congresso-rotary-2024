<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/events', [EventController::class, 'index'])
    ->name('events');

Route::get('/dashboard', function () {
    return redirect()->route('dashboard.personal');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/personal', [RegistrationController::class, 'currentUserRegistrations'])
    ->middleware(['auth', 'verified'])->name('dashboard.personal');

Route::get('/dashboard/events', [EventController::class, 'dashboardIndex'])
    ->middleware(['auth', 'verified'])->name('dashboard.events');

Route::get('/dashboard/participants', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.participants');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/events', [EventController::class, 'create'])
->middleware(['auth', 'verified']) ->name('events.create');

Route::put('/events/{event}', [EventController::class, 'update'])
->middleware(['auth', 'verified']) ->name('events.update');

Route::delete('/events/{event}', [EventController::class, 'destroy'])
->middleware(['auth', 'verified']) ->name('events.destroy');

Route::post('/registrations', [RegistrationController::class, 'create'])
->middleware(['auth', 'verified']) ->name('registrations.create');

Route::delete('/registrations/{registration}', [RegistrationController::class,'destroy'])
->middleware(['auth', 'verified']) ->name('registrations.destroy');

Route::post('/makeadmin', [UserController::class,'makeAdmin'])
->middleware(['auth', 'verified']) ->name('makeadmin');

require __DIR__ . '/auth.php';