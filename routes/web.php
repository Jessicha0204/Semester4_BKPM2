<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-message', function () {
    broadcast(new MessageSent('Hello, this is a test message!'));
    return 'Message sent!';
});

Route::post('/broadcast', function () {
    return view('broadcast');
});

