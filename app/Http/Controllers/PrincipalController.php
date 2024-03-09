<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Principal;
use App\Http\Resources\PrincipalCollection;
use App\Http\Resources\PrincipalResource;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principal = principal::all();
        return new PrincipalCollection($principal);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'summary' => 'required',
        //     'body' => 'required',
        //     'image' => 'required'
        // ]);
        // $principal = Principal::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $principal)
    {
        $resource = Principal::find($principal);
        if (!$resource) {
            return response()->json(['error' => [
                "status" => 404,
                "title" => "Resource Not Found",
                "detail" => "The requested resource was not found"
            
            ]], 404);
        }
        return new PrincipalResource($resource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
