<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Notifications\NewUserNotification;
use App\Mail\welcomeMail;
use App\Models\User;

// use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User Dashboard
Route::get('/user/dashboard', function () {
    return "Welcome User!";
})->middleware(['auth', 'role:user']);

// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return "Welcome Admin!";
})->middleware(['auth', 'role:admin']);

Route::get('/send-notification', function () {
    $user = User::find(1); // jis user ko bhejna hai
    $user->notify(new NewUserNotification("Welcome to the platform!"));
    return "Notification Sent!";
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/send-test-mail', function () {
    $user = User::first();
    Mail::to($user->email)->send(new WelcomeMail($user));
    return "✅ Test mail sent to {$user->email}";
});

Route::get('/change-role/{id}/{role}', [AdminController::class, 'changeRole']);

Route::get('/base', function () {
    $user = auth()->user();   // current logged-in user
    if ($user) {
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
    return "Welcome to dashboard!";
})->middleware('auth');

// routes/web.php
use App\Http\Controllers\AnnouncementController;

Route::middleware(['auth'])->group(function () {
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->middleware('can:create,App\Models\Announcement');
    Route::post('/announcements/{announcement}/read', [AnnouncementController::class, 'markRead'])->name('announcements.read');
});

require __DIR__.'/auth.php';
