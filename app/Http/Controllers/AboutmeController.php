<?php

namespace App\Http\Controllers;

use App\Models\aboutme;
use Illuminate\Http\Request;
use App\Http\Resources\AboutmeCollection;
use App\Http\Resources\AboutmeResource;


class AboutmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutme = Aboutme::all();
        return new AboutmeCollection($aboutme);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aboutme = new Aboutme($request-> input('data.attributes'));
        $aboutme->save();
        return new AboutmeResource($aboutme);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $aboutme)
    {
        $resource = Aboutme::find($aboutme);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        return new AboutmeResource($resource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aboutme $aboutme)
    {
        $resource = Aboutme::find($aboutme);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        $resource->update($request->input('data.attributes'));
        $resource->save();

        return new AboutmeResource($resource);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $aboutme)
    {
        $resource = Aboutme::find($aboutme);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        $resource->delete();
        return response(null, 204);
    }
}
