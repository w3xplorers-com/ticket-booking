<?php

use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('authors', AuthorsController::class);
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('authors.tickets', AuthorTicketsController::class);
});
