<?php

namespace App\Http\Resources\Laptop;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaptopShowResorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Name_l'=>$this->Name_l,
            'Model_l'=>$this->Model_l,
            'Cpu_l'=>$this->Cpu_l,
            'Color_l'=>$this->Color_l,
            'Ram_l'=>$this->Ram_l,
            'Url_Image'=>$this->Url_Image,
            'Existence_l'=>$this->Existence_l

        ];
    }
}
