<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api')->post('/register', 'AuthController@register');

Route::middleware('api')->post('/login', 'AuthController@login');
Route::middleware('api')->get('/gradebooks', 'GradebookController@index');
Route::middleware('api')->get('/professors', 'ProfessorController@index');

