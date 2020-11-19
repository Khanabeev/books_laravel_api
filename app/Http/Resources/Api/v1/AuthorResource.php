<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'family_name' => $this->family_name,
            'middle_name' => $this->middle_name,
            'date_of_birth' => $this->date_of_birth,
            'date_of_death' => $this->date_of_death,
        ];
    }
}
