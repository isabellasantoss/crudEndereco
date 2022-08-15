<?php

use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ EnderecoController::class, 'index' ])->name('home');
Route::get('usuario/ajaxDataTable', [ EnderecoController::class, 'ajaxDataTable'])->name('endereco.ajaxDataTable');
Route::resource('endereco', EnderecoController::class);
