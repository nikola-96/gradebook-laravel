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
Route::middleware('api')->get('/professor/{id}', 'ProfessorController@show');
Route::middleware('api')->get('/gradebooks/create', 'GradebookController@create');
Route::middleware('api')->post('gradebooks/store', 'GradebookController@store');
Route::middleware(['api', 'jwt'])->get('/my-gradebook', 'GradebookController@my_gradebook');
Route::middleware('api')->get('professors/create', 'ProfessorController@create');
Route::middleware('api')->post('/gradebooks/students/store', 'StudentController@store');
Route::middleware('api')->get('/gradebook/{id}', 'GradebookController@show');
