<?php

namespace App\Http\Resources;

use App\Models\Vrsta;
use App\Models\Ukus;
use Illuminate\Http\Resources\Json\JsonResource;

class PoslasticaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $ukus = Ukus::find($this->ukusId);
        $vrsta = Vrsta::find($this->vrstaId);

        return [
            'id' => $this->id,
            'vrsta' => $vrsta->vrsta,
            'naziv' => $this->naziv,
            'ukus' => $ukus->ukus,
            'recept' => $this->recept
        ];
    }
}
