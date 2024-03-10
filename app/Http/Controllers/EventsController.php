<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;
use App\Http\Resources\EventsCollection;
use App\Http\Resources\EventsResource;
use App\Http\Requests\EventsFormRequest;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();
        return new EventsCollection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsFormRequest $request)
    {
        $events = new Events($request-> input('data.attributes'));
        $events->save();
        return new EventsResource($events);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $events)
    {
        $resource = Events::find($events);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        return new EventsResource($resource);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsFormRequest $request, int $events)
    {
        $resource = Events::find($events);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        $resource->update($request->input('data.attributes'));
        $resource->save();

        return new EventsResource($resource);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        $events->delete();
        return response(null, 204);
    }
  
}
