<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
/* use App\Http\Resources\PlanResource; */

class WeekResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* return parent::toArray($request); */

        return [
            'unit'              => $this->unit,
            'semana'            => $this->semana,
            'contenido'         => $this->contenido,
            'comp_esp'          => $this->comp_esp,
            'crit_desemp'       => $this->crit_desemp,
            'est_didac'         => $this->est_didac,
            'eval'              => $this->eval,
            'rec_apren'         => $this->rec_apren,
            'biblio'            => $this->biblio,
            /* 'plans_id'          => $this->plans_id, */
            /* 'plan'              => new PlanResource($this->plan), */
            'plans'             => PlanResource::collection($this->whenLoaded('plans')),
            'planning'          => new PlanningResource($this->planning),
        ];
    }
}
