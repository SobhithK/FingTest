<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;

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
    return view('home');
});

Route::post('/storeStudent',[studentController::class,'storeStudent'])->name('addstudent');
Route::get('/create',[studentController::class,'createStudent'])->name('createStudent');
Route::get('/students',[studentController::class,'getStudents'])->name('getstudents');
Route::get('/student/edit/{id}',[studentController::class,'editStudent'])->name('editStudent');
Route::post('/updateStudent',[studentController::class,'updateStudent'])->name('updatestudent');
Route::get('/student/delete/{id}',[studentController::class,'deleteStudent'])->name('deleteStudent');
Route::get('/addMarks',[studentController::class,'getMarks'])->name('addmarks');
Route::post('/storeMarks',[studentController::class,'storeMarks'])->name('storemarks');
Route::get('/studentsMarkslist',[studentController::class,'getMarkList'])->name('getMarkList');
Route::get('/studentmarks/edit/{id}',[studentController::class,'editStudentMarks'])->name('editStudentMarks');
Route::get('/studentmarks/delete/{id}',[studentController::class,'deleteStudentMArks'])->name('deleteStudentMarks');
Route::post('/updateStudentMark',[studentController::class,'updateStudentMark'])->name('updatestudentMark');