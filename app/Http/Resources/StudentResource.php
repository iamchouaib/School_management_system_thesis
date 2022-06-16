<?php

namespace App\Http\Resources;

use App\Models\Groupe;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'guardian_id' => $this->guardian_id,
            'image' => $this->image,
            'groupe_id' => $this->groupe_id,
            'status' => $this->status,

            //relations
            'groupe' => new GroupeResource($this->groupe)
        ];
    }
}
