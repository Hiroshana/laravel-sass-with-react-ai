<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;


Route::get('/', function () {

    $user = auth()->user();
    $userStatus = null;

    if($user){
       $user->load('plan');
       $userStatus = [
           'pdfCount' => $user->pdf_count ?? 0,
           'pdfLimit' => $user->plan?->pdf_limit ?? 0,
           'canUpload' => $user->canSummarizePdf(),
       ];
    }

    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
        'plans' => \App\Models\Plan::where('is_active', true)->orderBy('price')->get(),
        'auth' => [
            'user' => $user,
        ],
        'userStatus' => $userStatus,
    ]);
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
