<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->Url_Picture != null?$Url_Picture =env('APP/URL').'/'.$this->Url_Picture: $Url_Picture=null;

        return [
            'name'=>$this->name,
            'family'=>$this->family,
            'Phone'=>$this->Phone,
            'address'=>$this->address,
            'National_code'=>$this->National_code,
            'email'=>$this->email,
            'password'=>$this->password,
            'Url_Picture'=>$this->Url_Picture,
        ];
    }
}
