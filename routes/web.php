<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcerciseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcerciseHistoryController;
use App\Http\Controllers\WorkoutRoutineController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DietTypeController;

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
    return view('dashboard');
})->name('dashboard');

/*Route::get('/dashboard', function () {
    return view('dashboard');
});*/

Route::resource('/excercises', ExcerciseController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::get('/excercises', [ExcerciseController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/excercises/{excercise}', [ExcerciseController::class, 'getExcercisesByType'])->middleware(['auth', 'verified'])->name('excerciseType');
Route::get('/excercises/{excercise_type}/{excercise}', [ExcerciseController::class, 'show'])->middleware(['auth', 'verified']);

Route::resource('/user', UserController::class)->middleware(['auth', 'verified'])->only(
    'show', 'edit', 'update', 'delete'
);

Route::resource('/excercise-history', ExcerciseHistoryController::class)
       ->except(['create, show'])->middleware(['auth', 'verified']);
//Maybe this should get another controller?
Route::get('/my-routine', [ExcerciseHistoryController::class, 'myRoutine'])->middleware(['auth', 'verified']);

Route::resource('/workout-routines', WorkoutRoutineController::class)->middleware(['auth', 'verified']);

Route::resource('/ingredients', IngredientController::class)->middleware(['auth', 'verified']);

Route::resource('/foods', FoodController::class)->middleware(['auth', 'verified']);

Route::resource('/diet-types', DietTypeController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::get('/diet-types', [DietTypeController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/diet-types/{diet_type}', [DietTypeController::class, 'show'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
