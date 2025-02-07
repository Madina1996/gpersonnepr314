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

Route::get('/', [App\Http\Controllers\PersonneDbController::class,'index']);
Route::get('/ajout',function (){
   return view("ajout");
});
/*Route::get('/edite/{id}',function ($prenom){
    return view("edite",compact("prenom"));
});*/
Route::get('/edit/{id}',[App\Http\Controllers\PersonneDbController::class,'edit']);

Route::post('save',[App\Http\Controllers\PersonneDbController::class,'store']);
Route::put('update',[App\Http\Controllers\PersonneDbController::class,'update']);
Route::get('supprimer/{id}',[App\Http\Controllers\PersonneDbController::class,'destroy']);
