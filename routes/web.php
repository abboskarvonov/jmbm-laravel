<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\JournalIssueController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('/members', [PageController::class, 'members'])->name('members');
Route::get('/requirements', [PageController::class, 'requirements'])->name('requirements');
Route::get('/statue', [PageController::class, 'statue'])->name('statue');
Route::get('/archive', [PageController::class, 'archive'])->name('archive');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/archive/all', [JournalIssueController::class, 'all'])->name('archive.all');
Route::get('/articles/all', [ArticleController::class, 'all'])->name('articles.all');

Route::resources([
    'articles' => ArticleController::class,
    'menus' => MenuController::class,
    'archive' => JournalIssueController::class,
    'about' => AboutController::class,
    'comments' => CommentsController::class
]);

require __DIR__ . '/auth.php';
