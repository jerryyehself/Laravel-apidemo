<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'staff_name' => $this->name,
            'staff_email' => $this->email,
            'staff_belong_department' => new Department($this->department),
            'staff_principal_company' => Company::collection($this->whenLoaded('companies')),
        ];
    }
}
