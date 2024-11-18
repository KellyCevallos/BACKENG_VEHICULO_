<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    // Mostrar todos los vehículos
    public function index()
    {
        return response()->json(Vehiculo::all(), 200);
    }

    // Guardar un nuevo vehículo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ], 400);
        }

        $vehiculo = Vehiculo::create([
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
        ]);

        return response()->json([
            'message' => 'Vehículo creado con éxito.',
            'data' => $vehiculo,
        ], 201);
    }

    // Mostrar un vehículo específico
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        return response()->json($vehiculo, 200);
    }

    // Actualizar un vehículo
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ], 400);
        }

        $vehiculo->update($request->all());

        return response()->json([
            'message' => 'Vehículo actualizado con éxito.',
            'data' => $vehiculo,
        ], 200);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado.'], 404);
        }

        $vehiculo->delete();

        return response()->json(['message' => 'Vehículo eliminado con éxito.'], 200);
    }
}
