<?php

namespace App\Http\Resources;

use App\Models\Planning;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'unit'          => $this->unit,
            'comp_esp'      => $this->comp_esp,
            'crit_desemp'   => $this->crit_desemp,
            'est_eva'       => $this->est_eva,
            'inst_eva'      => $this->inst_eva,
            'tip_eva'       => $this->tip_eva,
            'evid_eva'      => $this->evid_eva,
            'retro'         => $this->retro,
            'lapso'         => $this->lapso,
            'ponderacion'   => $this->ponderacion,
            /* 'unit_id'       => $this->unit_id, */
            'planning_id'   => $this->planning_id,

            'planning'      => new PlanningResource($this->planning),
            'units'         => UnitResource::collection($this->whenLoaded('units')),
        ];
    }
}
