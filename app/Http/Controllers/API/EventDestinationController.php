<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatter;
use App\Models\EventDestination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventDestinationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $eventDestination = EventDestination::with('UserRateDestination')->get();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'eventDestination' => $eventDestination,
                ]
            ]);

        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function create(Request $request)
    {
        try {
            $path = null;
            if ($request->hasFile('image_event')) {
                $path = $request->file('image_event')->store('public/image_event');
            }

            $eventDestination = EventDestination::create([
                'id_destinations' => $request->id_destinations,
                'name_event' => $request->name_event,
                'location_event' => $request->location_event,
                'ratting_event_destination_acc' => $request->ratting_event_destination_acc,
                'image_event' => $path,
                'description_event_destination' => $request->description_event_destination,
                'date_event' => $request->date_event,
                'price_event' => $request->price_event,
            ]);


            if (!$eventDestination) {
                throw new Exception("Event Destination Not Found", 1);
            }

            return ResponseFormatter::success($eventDestination, 'Event Destination Created', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $eventDestination = EventDestination::findOrFail($id);

            
            if ($request->hasFile('image_event')) {
                $path = $request->file('image_event')->store('public/image_event');
            } else {
                $path = $eventDestination->image_event;
            }

            $eventDestination->update([
                'id_destinations' => $request->id_destinations,
                'name_event' => $request->name_event,
                'location_event' => $request->location_event,
                'ratting_event_destination_acc' => $request->ratting_event_destination_acc,
                'image_event' => $path,
                'description_event_destination' => $request->description_event_destination,
                'date_event' => $request->date_event,
                'price_event' => $request->price_event,
            ]);


            if (!$eventDestination) {
                throw new Exception("Event Destination Not Found", 1);
            }

            return ResponseFormatter::success($eventDestination, 'Event Destination Updated', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $eventDestination = EventDestination::findOrFail($id);

            if ($eventDestination->image_event) {
                Storage::disk('local')->delete('public/' . $eventDestination->image_event);
            }
            $eventDestination->delete();

            return ResponseFormatter::success($eventDestination, 'Event Destination Deleted', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
