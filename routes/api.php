<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return ['hello' => 'world'];
});

Route::resource('survey', SurveyController::class)->only(['store']);
