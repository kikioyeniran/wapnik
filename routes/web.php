<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/who-we-are', 'pages.who-we-are')->name('who-we-are');
Route::view('/events', 'pages.events')->name('events');
Route::view('/apply', 'pages.apply')->name('apply');
