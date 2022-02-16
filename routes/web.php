<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    //Teacher
    Route::post('teachers/store',[\App\Http\Controllers\Admin\TeacherController::class,'store'])->name('teachers.store');
    Route::post('class-rooms/store',[\App\Http\Controllers\Admin\ClassRoomController::class,'store']);
    Route::post('subjects/store',[\App\Http\Controllers\Admin\SubjectController::class,'store']);
    Route::post('disciplines/store',[\App\Http\Controllers\Admin\DisciplineController::class,'store']);

});
