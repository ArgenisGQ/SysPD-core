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
            'id'            => $this->id,
            'unit'          => $this->unit,
            /* 'comp_esp'      => $this->comp_esp,
            'crit_desemp'   => $this->crit_desemp, */
            'unitf'         => new PlanUnitResource($this->plan_unit), //buscar la unidad de la actividad
            'name_est_eva'  => $this->name_est_eva,
            'est_eva'       => $this->est_eva,
            'inst_eva'      => $this->inst_eva,
            'tip_eva'       => $this->tip_eva,
            'evid_eva'      => $this->evid_eva,
            'retro'         => $this->retro,
            'lapso'         => $this->lapso,
            'semana'        => $this->semana,
            'ponderacion'   => $this->ponderacion,
            /* 'unit_id'       => $this->unit_id, */
            'planning_id'   => $this->planning_id,
            'plan_unit_id'  => $this->plan_unit_id,
            'weeks_id'      => $this->weeks_id,
            'week'          => new WeekResource($this->week),
            'planning'      => new PlanningResource($this->planning),
            /* 'weeks'         => WeekResource::collection($this->whenLoaded('weeks')), */


        ];
    }
}
