<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

;

Route::get('vehiculos', [VehiculoController::class, 'index']); // Mostrar todos los vehículos
Route::post('vehiculos', [VehiculoController::class, 'store']); // Crear un nuevo vehículo
Route::get('vehiculos/{id}', [VehiculoController::class, 'show']); // Mostrar un vehículo por ID
Route::put('vehiculos/{id}', [VehiculoController::class, 'update']); // Actualizar un vehículo por ID
Route::delete('vehiculos/{id}', [VehiculoController::class, 'destroy']); // Eliminar un vehículo por ID
