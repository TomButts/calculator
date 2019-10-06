<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Calculator as Calculator;

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'web'], function () {
    Route::prefix('calculator')->group(function () {
        Route::get('/',  'CalculatorController@index');

        Route::get('append/{value}',  'CalculatorController@append');
        
        Route::get('operand/{value}',  'CalculatorController@operand');

        Route::get('updateCurrent/{operation}',  'CalculatorController@updateCurrent');

        Route::get('equal',  'CalculatorController@equal');

        Route::get('clear',  'CalculatorController@clear');

        Route::get('save',  'CalculatorController@save');
    });
});