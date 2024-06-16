<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatter;
use App\Models\Destination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationsController extends Controller
{
    public function index(Request $request)
    {
        $destinations = Destination::with(['fasilitas', 'EventDestination', 'UserRateDestination'])->get();
        return ResponseFormatter::success(
            $destinations,
            'destinations found'
        );

    }

     public function create(Request $request)
    {
        try {
            if ($request->hasFile('thubmnail')) {
                $path = $request->file('thubmnail')->store('public/thubmnail');
            }

            $destination = Destination::create([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'thubmnail' => $path,
                'price' => $request->price,
                'ratting_destination_acc' => $request->ratting_destination_acc,
                'name_event_destination' => $request->name_event_destination,
                'date_event' => $request->date_event,
            ]);

            if (!$destination) {
                throw new Exception("destination Not Found", 1);
            }

            return ResponseFormatter::success($destination, 'destination Created', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $destination = Destination::find($id);

            if (!$destination) {
                throw new Exception("destination Not Found", 1);
            }

            if ($request->hasFile('thubmnail')) {
                if ($destination->thubmnail) {
                    Storage::disk('public')->delete('public/' . $destination->thubmnail);
                }   


                $path = $request->file('thubmnail')->store('public/thubmnail');
            }


            $destination->update([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'thubmnail' => isset($path) ? $path : $destination->thubmnail,
                'price' => $request->price,
                'ratting_destination_acc' => $request->ratting_destination_acc,
                'name_event_destination' => $request->name_event_destination,
                'date_event' => $request->date_event,
            ]);

            return ResponseFormatter::success($destination, 'destination Update', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }


    public function show($slug) {
        try {
            $destination = Destination::with(['fasilitas', 'EventDestination', 'UserRateDestination'])->where('slug', $slug)->firstOrFail();

            if (!$destination) {
                throw new Exception('destination Not Found');
            }

            
            return ResponseFormatter::success($destination, 'destination Found', 200);


        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function delete($id) {
        try {
            $destination = Destination::find($id);
            Storage::disk('local')->delete('public/' . $destination->thubmnail);

            if (!$destination) {
                throw new Exception('destination Not Found');
            }
            $destination->delete();

            return ResponseFormatter::success('destination Deleted', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
