<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'family'=>$this->family,
            'Phone'=>$this->Phone,
            'address'=>$this->address,
            'National_code'=>$this->National_code,
            'email'=>$this->email,
            'password'=>$this->password,
        ];
    }
}
