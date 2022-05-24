<?php

namespace App\Http\Resources;

use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\User as UserResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactLists extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'list_id' => $this->id,
            'company' => new CompanyResource(Company::find($this->company_id)),
            'staff' => new UserResource(User::find($this->user_id))
        ];
    }
}
