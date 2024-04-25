<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Models\Synoptic;

class CourseResource extends JsonResource
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
        'name'          => $this->name,
        'code'          => $this->code,
        'section'       => $this->section,
        'unit01'        => $this->unit01,
        'unit02'        => $this->unit02,
        'unit03'        => $this->unit03,
        'unit04'        => $this->unit04,
        'unit05'        => $this->unit04,
        'unit06'        => $this->unit05,
        'unit07'        => $this->unit07,
        'unit08'        => $this->unit08,
        'unit09'        => $this->unit09,
        'unit10'        => $this->unit10,
        'unit11'        => $this->unit11,
        'unit12'        => $this->unit12,
        'unit13'        => $this->unit13,
        'unit14'        => $this->unit14,
        'unit15'        => $this->unit15,
        'unit16'        => $this->unit16,
        'unitTotal'     => $this->unitTotal,
        /* 'user_id'       => $this->user_id, */
        'synoptic_id'   => $this->synoptic_id,
        /* 'planning_id'   => $this->synoptic_id, */

        /* 'user' => UserResource::collection($this->whenLoaded('user')) */
        /* 'user' => UserResource::collection($this->whenLoaded('user')) */
        'synoptic'      => new SynopticResource($this->synoptic),
        'user'          => new UserResource($this->user),
        /* 'plannings'     => new PlanningResource($this->plannings) */

        ];
    }
}
