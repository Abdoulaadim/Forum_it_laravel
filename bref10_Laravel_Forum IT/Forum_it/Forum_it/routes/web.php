<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\QuestionController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//.. Other routes

Auth::routes();

Route::get('admin', [HomeController::class, 'adminx'])->name('admin')->middleware('is_admin');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('adminedit', [HomeController::class, 'edit'])->name('adminedit');
// Route::get('/', [LoginController::class, 'login']);
// Route::get('/', [LoginController::class, 'logout']);


Route::get('admin', [QuestionController::class, 'index'])->name('admin');
// Route::get('adminx', [QuestionController::class, 'joinadmin'])->name('adminix');
Route::get('home', [QuestionController::class, 'indexhome'])->name('home');
Route::post('/ajouter', [QuestionController::class, 'store'])->name('questions.ajouter');
Route::get('reponse/{id}', [ReponseController::class, 'index']);
Route::post('/ajoutereponse', [ReponseController::class, 'store'])->name('reponse.ajouter');
Route::get('adminedit/{id}', [QuestionController::class, 'edit']);
Route::put('admineditupdate/{id}', [QuestionController::class, 'update'])->name('admineditupdate');
Route::get('delete/{id}', [QuestionController::class, 'destroy']);


// Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
// Route::get('delete/{id}', [QuestionController::class, 'destroy'])->name('questions.delete')->where('id','[0-9]+');
// Route::get('/show', [QuestionController::class, 'index'])->name('questions.index');




