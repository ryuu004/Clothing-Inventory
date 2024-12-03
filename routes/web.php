<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('items', ItemController::class)->except(['show']);
Route::resource('transactions', TransactionController::class);