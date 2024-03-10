<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Resources\ServicesCollection;
use App\Http\Resources\ServicesResource;
use App\Http\Requests\ServicesFormRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        return new ServicesCollection($services);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesFormRequest $request)
    {
        $services = new Services($request-> input('data.attributes'));
        $services->save();
        return new ServicesResource($services);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $services)
    {
        $resource = Services::find($services);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        return new ServicesResource($resource);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesFormRequest $request, Services $services)
    {
        $services->update($request->input('data.attributes'));
        $services->save();

        return new ServicesResource($services);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        //
    }
}
