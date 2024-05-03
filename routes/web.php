<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group(function(){
    Route::any('form/{id?}','form')->name('form');
    
    //route to test abstract class 
    Route::get('index','index'); 
    //route to test abstract class 

});
