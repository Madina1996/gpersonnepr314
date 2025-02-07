<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PersonneFileController::class,'index']);
Route::get('/ajout',function (){
   return view("ajout");
});
/*Route::get('/edite/{id}',function ($prenom){
    return view("edite",compact("prenom"));
});*/
Route::get('/edit/{id}',[App\Http\Controllers\PersonneFileController::class,'edit']);

Route::post('save',[App\Http\Controllers\PersonneFileController::class,'store']);
Route::put('update',[App\Http\Controllers\PersonneFileController::class,'update']);
Route::get('supprimer/{id}',[App\Http\Controllers\PersonneFileController::class,'destroy']);
