<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

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

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])
    ->name('events');

Route::get('/dashboard', function () {
    return redirect()->route('dashboard.personal');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/personal', [App\Http\Controllers\RegistrationController::class, 'currentUserRegistrations'])
    ->middleware(['auth', 'verified'])->name('dashboard.personal');

Route::get('/dashboard/events', [App\Http\Controllers\EventController::class, 'dashboardIndex'])
    ->middleware(['auth', 'verified'])->name('dashboard.events');

Route::get('/dashboard/participants', [App\Http\Controllers\UserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.participants');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';