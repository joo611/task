<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\PostController as PublicPostController;

// Redirect root URL to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Laravel Auth Routes (login, register, etc.)
Auth::routes();

// Redirect /home after login to admin dashboard (or users list)
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->name('home');

// AdminLTE Dashboard Route
Route::get('/admin', function () {
    return view('admin.dashboard'); // this view must extend AdminLTE
})->name('admin.dashboard')->middleware('auth');

// Admin CRUD routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});

Route::middleware(['auth'])->prefix('admin')->name('notifications.')->group(function () {
        Route::get('notifications', [NotificationController::class, 'index'])->name('index');
        Route::get('/{id}', [NotificationController::class, 'show'])->name('show');
        Route::post('/mark-all-read', [NotificationController::class, 'markAllRead'])->name('markAllRead');
        Route::post('/{id}/mark-read', [NotificationController::class, 'markRead'])->name('markRead');
});

Route::get('/posts', [PublicPostController::class, 'publicIndex'])->name('public.posts');
Route::post('/posts/public-store', [PublicPostController::class, 'publicStore'])->name('posts.public.store');

Route::get('/debug-notifications', function () {
    $user = \Auth::user();
    return [
        'user_id' => $user->id,
        'is_admin' => $user->is_admin,
        'notifications' => $user->notifications,
        'unread' => $user->unreadNotifications,
    ];
});
