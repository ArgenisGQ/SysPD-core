<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PlanResource;

class PlanningResource extends JsonResource
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

        return[
            'curricularunit'    => $this->curricularunit,
            'code'              => $this->code,
            'section'           => $this->section,
            'period'            => $this->period,
            'user_id'           => $this->user_id,
            'course_id'         => $this->course_id,
            'plans'             => PlanResource::collection($this->whenLoaded('plans')),
            'user'              => new UserResource($this->user),
            'course'            => new CourseResource($this->course),
            /* 'plans'             => PlanResource::collection($this->whenLoaded('plans')) */
        ];

    }
}
