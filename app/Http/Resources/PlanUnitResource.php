<?php

namespace App\Http\Resources;

use App\Models\Synoptic;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanUnitResource extends JsonResource
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
            /* 'unit_id'       => $this->unit_id, */
            'plan_id'       => $this->plan_id,

            /* 'planning'      => new PlanningResource($this->planning), */
            'synoptic'      => new SynopticResource($this->synoptic),
            'plans'         => PlanResource::collection($this->whenLoaded('plans')),
        ];
    }
}
