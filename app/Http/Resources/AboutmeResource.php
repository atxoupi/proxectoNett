<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutmeResource extends JsonResource
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
            'type' => "Aboutme",
            'attributes' => [
                'id' => $this->id,
                'title' => $this->title,
                'text' => $this->text,
                'image' => $this->image,
            ],
            'links' => [
                'self' => url(path: "api/aboutme/".$this->id)
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
