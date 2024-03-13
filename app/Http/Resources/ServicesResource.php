<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            'type' => "Services",
            'attributes' => [
                'id' => $this->id,
                'title' => $this->title,
                'summary' => $this->summary,
                'body' => $this->body,
                'image' => $this->image,
                'section' => $this->section,
            ],
            'links' => [
                'self' => url(path: "api/services/".$this->id)
            ]
            ];
    }

    public function with($request)
    {
        return [
            "jsonapi" => [
                "version" => "1.0"
            ],
        ];
    }
}
