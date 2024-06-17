<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::get('/', [StoryController::class, 'index'])->name('Welcome');
Route::get('/story/create',[StoryController::class,'create'])->name('story.create');
Route::post('/story',[StoryController::class,'store']);
Route::get('/story/{id}',[StoryController::class,'show'])->name('story.show');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
