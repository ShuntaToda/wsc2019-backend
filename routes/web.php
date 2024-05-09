<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, "index"])->name("login");
Route::post('/', [LoginController::class, "login"])->name("login");
Route::get('/logout', [LoginController::class, "logout"])->middleware("auth")->name("logout");

Route::middleware(["auth"])->prefix("admin")->as("admin.")->group(function () {
    Route::prefix("event")->as("event.")->group(function () {
        Route::get("home", [EventController::class, "index"])->name("home");
    });
});
