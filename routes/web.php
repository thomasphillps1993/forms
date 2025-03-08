<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ConversationController;

use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/send', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback/submissions', [FeedbackController::class, 'index'])->name('feedback.index');
});




Route::middleware(['auth'])->group(function () {
    // Display all conversations
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');

    // Show the form for creating a new conversation
    Route::get('/conversations/create', [ConversationController::class, 'create'])->name('conversation.create');

    // Store a new conversation
    Route::post('/conversations', [ConversationController::class, 'store'])->name('conversation.store');

    // Show a specific conversation
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
    Route::post('/conversations/{conversation}/comments', [CommentController::class, 'store'])->name('comment.store');

});
require __DIR__.'/auth.php';
