<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Postcrud;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Postcrud::class)->name('dashboard');
    // Route for displaying the post
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});
