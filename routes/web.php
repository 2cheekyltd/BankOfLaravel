<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/register', 'Auth\RegisterController@viewRegister')->name('auth');
Route::post('/register', 'Auth\RegisterController@register')->name('auth');

Route::get('/chgPassword', 'Auth\LoginController@viewChgPassword');
Route::post('/chgPassword', 'Auth\LoginController@chgPassword');

Route::get('/login', 'Auth\LoginController@viewLogin')->name('auth');
Route::post('/login', 'Auth\LoginController@login')->name('auth');

Route::get('/deposit', 'Main\DepositController@viewDeposit')->name('main');
Route::post('/deposit', 'Main\DepositController@deposit')->name('main');

Route::get('/withdrow', 'Main\WithdrowController@viewWithdrow')->name('main');
Route::post('/withdrow', 'Main\WithdrowController@withdrow')->name('main');

Route::get('/transaction', 'Main\TransactionController@getTransaction')->name('main');