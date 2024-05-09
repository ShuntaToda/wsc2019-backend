<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, "index"])->name("login");
Route::post('/', [LoginController::class, "login"])->name("login");
Route::get('/logout', [LoginController::class, "logout"])->middleware("auth")->name("logout");

Route::middleware(["auth"])->prefix("admin")->as("admin.")->group(function () {
    Route::prefix("event")->as("event.")->group(function () {
        Route::get("home", [EventController::class, "index"])->name("home");
        Route::get("create", [EventController::class, "create"])->name("create");
        Route::post("create", [EventController::class, "store"])->name("create");
        Route::get("edit/{id}", [EventController::class, "edit"])->name("edit");
        Route::post("edit/{id}", [EventController::class, "update"])->name("edit");
        Route::get("show/{id}", [EventController::class, "show"])->name("show");
    });
    Route::prefix("tickets")->as("tickets.")->group(function () {
        Route::get("create/{id}", [TicketController::class, "create"])->name("create");
        Route::post("create/{id}", [TicketController::class, "store"])->name("create");
    });
});
