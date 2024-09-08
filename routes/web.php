<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('project')->controller('Project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::patch('/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('project.show');
        Route::get('/{project}/issue/create', [IssueController::class, 'create'])->name('issue.create');
    });

    Route::prefix('issue')->controller('Issue')->group(function () {
        Route::get('/', [IssueController::class, 'index'])->name('issue.index');
        Route::get('/create', [IssueController::class, 'create'])->name('issue.create');
        Route::post('/', [IssueController::class, 'store'])->name('issue.store');
        Route::get('/{issue}/edit', [IssueController::class, 'edit'])->name('issue.edit');
        Route::patch('/{issue}', [IssueController::class, 'update'])->name('issue.update');
        Route::delete('/{issue}', [IssueController::class, 'destroy'])->name('issue.destroy');
        Route::get('/{issue}', [IssueController::class, 'show'])->name('issue.show');
    });

});


require __DIR__ . '/auth.php';
