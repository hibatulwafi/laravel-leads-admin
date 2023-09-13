<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
  return redirect()->route('app.home');
});

Route::middleware(['web', 'auth'])->group(function () {
  Route::get('export', [ExportController::class, 'export'])->name('export');
});

Route::group(['prefix' => 'dashboard', 'as' => 'app.', 'middleware' => ['web', 'auth']], function () {
  Route::get('home', [LeadController::class, 'index'])->name('home');
});

Route::group(['prefix' => 'authentication', 'as' => 'auth.', 'middleware' => 'web'], function () {
  Route::post('logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
  })->name('logout');
});

Route::group(['prefix' => 'authentication', 'middleware' => 'guest'], function () {
  Route::get('login', App\Http\Livewire\Authentication\Login\SimpleLoginComponent::class)->name('login');
});