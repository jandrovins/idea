<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'summary' => $this->getSummary(),
        ];
    }
}
