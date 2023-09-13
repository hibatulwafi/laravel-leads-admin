<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::post('/register', [LeadController::class, 'register'])->name('lead.register');
Route::post('/step1', [LeadController::class, 'step1'])->name('lead.step1');
Route::post('/step2', [LeadController::class, 'step2'])->name('lead.step2');
Route::post('/step3', [LeadController::class, 'step3'])->name('lead.step3');
