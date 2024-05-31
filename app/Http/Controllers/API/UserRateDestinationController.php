<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatter;
use App\Models\FasilitasDestination;
use App\Models\UserRateDestination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRateDestinationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $UserRateDestination = UserRateDestination::all();
            
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'UserRateDestination Found',
                'data' => [
                    'UserRateDestination' => $UserRateDestination,
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
            $user = Auth::user();
            $UserRateDestination = UserRateDestination::create([
                'id_user' => $user->id ?? null,
                "id_destinations"=> $request->id_destinations,
                'name' => $user->name ?? $request->name,
                'rating_destination' => $request->rating_destination,
                'comment_destination' => $request->comment_destination,
                'id_artikel_destinations' => $request->id_artikel_destinations,
                'rating_artikel_destination' => $request->rating_artikel_destination,
                'comment_artikel_destination' => $request->comment_artikel_destination,
                'id_event_destinations' => $request->id_event_destinations,
                'rating_event_destination' => $request->rating_event_destination,
                'comment_event_destination' => $request->comment_event_destination,
            ]);

            if (!$UserRateDestination) {
                throw new Exception("UserRateDestination Not Found", 1);
            }

            return ResponseFormatter::success($UserRateDestination, 'UserRateDestination Created', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $UserRateDestination = UserRateDestination::findOrFail($id);

            if (!$UserRateDestination) {
                throw new Exception("UserRateDestination Not Found", 1);
            }

            $UserRateDestination->update([
                'id_user' => $user->id ?? null,
                "id_destinations"=> $request->id_destinations,
                'name' => $user->name ?? $request->name,
                'rating_destination' => $request->rating_destination,
                'comment_destination' => $request->comment_destination,
                'id_artikel_destinations' => $request->id_artikel_destinations,
                'rating_artikel_destination' => $request->rating_artikel_destination,
                'comment_artikel_destination' => $request->comment_artikel_destination,
                'id_event_destinations' => $request->id_event_destinations,
                'rating_event_destination' => $request->rating_event_destination,
                'comment_event_destination' => $request->comment_event_destination,
            ]);

            return ResponseFormatter::success($UserRateDestination, 'UserRateDestination Update', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $UserRateDestination = UserRateDestination::findOrFail($id);
            if (!$UserRateDestination) {
                throw new Exception("UserRateDestination Not Found", 1);
            }

            $UserRateDestination->delete();
            return ResponseFormatter::success($UserRateDestination, 'UserRateDestination Deleted', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
