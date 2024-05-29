<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatter;
use App\Models\FasilitasDestination;
use Exception;
use Illuminate\Http\Request;

class FasilitasDestinationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $fasilitas = FasilitasDestination::all();
            
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'fasilitas Found',
                'data' => [
                    'fasilitas' => $fasilitas,
                ],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $fasilitas = FasilitasDestination::create([
                'id_destinations' => $request->id_destinations,
                'wifi' => $request->wifi,
                'parkir_destination' => $request->parkir_destination,
                'ac_destination' => $request->ac_destination,
                'kolam_destination' => $request->kolam_destination,
                'rated_wisata' => $request->rated_wisata,
            ]);

            if (!$fasilitas) {
                throw new Exception("fasilitas Not Found", 1);
            }

            return ResponseFormatter::success($fasilitas, 'fasilitas Created', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $fasilitas = FasilitasDestination::findOrFail($id);

            if (!$fasilitas) {
                throw new Exception("fasilitas Not Found", 1);
            }

            $fasilitas->update([
                'id_destinations' => $request->id_destinations,
                'wifi' => $request->wifi,
                'parkir_destination' => $request->parkir_destination,
                'ac_destination' => $request->ac_destination,
                'kolam_destination' => $request->kolam_destination,
                'rated_wisata' => $request->rated_wisata,
            ]);

            return ResponseFormatter::success($fasilitas, 'fasilitas Update', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $fasilitas = FasilitasDestination::findOrFail($id);
            if (!$fasilitas) {
                throw new Exception("fasilitas Not Found", 1);
            }

            $fasilitas->delete();
            return ResponseFormatter::success($fasilitas, 'fasilitas Deleted', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
