<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\{
    HomeController,
    GalleryController,
    PhotoController,
    InfoController,
    AgendaController,
    UserController,
    Admin\DashboardController,
    CommentController,
    ContactController
};

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/gallery', [GalleryController::class, 'userindex'])->name('gallery.index');
    Route::get('/gallery/{gallery}/photos', [GalleryController::class, 'usershow'])->name('gallery.show');
    Route::get('/agenda', [AgendaController::class, 'userindex'])->name('agenda.index');
    Route::get('/agendas/{id}', [AgendaController::class, 'show'])->name('agenda.show');
    Route::get('/info', [InfoController::class, 'userindex'])->name('info.index');
    Route::get('/infos/{id}', [InfoController::class, 'show'])->name('infos.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginStore'])->name('login.store');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('galleries', GalleryController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('users', UserController::class);
    Route::resource('photos', PhotoController::class)->except(['show']);
    Route::resource('infos', InfoController::class); 
    Route::resource('agendas', AgendaController::class);
    Route::get('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('/contacts/{contact}/mark-as-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.mark-as-read');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});


Route::get('/photos/{id}', [PhotoController::class, 'show'])->name('photos.show');
Route::post('/photos/{id}/comments', [PhotoController::class, 'storeComment'])->name('photos.comment.store');


Route::get('photos/{photo}/edit', [PhotoController::class, 'edit'])->name('dashboard.photos.edit');
Route::put('photos/{photo}', [PhotoController::class, 'update'])->name('dashboard.photos.update');
Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('dashboard.photos.destroy');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
