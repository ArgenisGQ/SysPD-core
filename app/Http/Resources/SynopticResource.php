<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SynopticResource extends JsonResource
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
        'name'              => $this->name,
        'code'              => $this->code,
        'purpose'           => $this->purpose,
        'priority'          => $this->priority,
        'total_hours'       => $this->total_hours,
        't'                 => $this->t,
        'l_t'               => $this->l_t,
        'i_sc_p'            => $this->i_sc_p,
        's'                 => $this->s,
        'a'                 => $this->a,
        'hde'               => $this->hde,
        'comp_esp'          => $this->comp_esp,
        'crit_desemp'       => $this->crit_desemp,
        'extruc_conten'     => $this->extruc_conten
        ];
    }
}
