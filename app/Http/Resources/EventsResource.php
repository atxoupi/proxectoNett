<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventsResource extends JsonResource
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
            'type' => "Events",
            'attributes' => [
                'id' => $this->id,
                'title' => $this->title,
                'date' => $this->date,
                'summary' => $this->summary,
                'image' => $this->image,
            ],
            'links' => [
                'self' => url(path: "api/events/".$this->id)
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
