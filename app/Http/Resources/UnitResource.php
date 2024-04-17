<?php

namespace App\Http\Resources;

use App\Models\Plans;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'contenido'         => $this->contenido,
            'comp_esp'          => $this->comp_esp,
            'crit_desemp'       => $this->crit_desemp,
            'est_didac'         => $this->est_didac,
            'eval'              => $this->eval,
            'rec_apren'         => $this->rec_apren,
            'biblio'            => $this->biblio,
            /* 'plan_id'           => $this->plan_id, */
            'plan'              => new PlanResource($this->plan),
        ];
    }
}
