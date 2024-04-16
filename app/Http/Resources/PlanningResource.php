<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'curricularunit'    => $this->currcularunit,
            'code'              => $this->code,
            'section'           => $this->section,
            'user_id'           => $this->user_id,
            'course_id'         => $this->course_id,
            'user'              => new UserResource($this->user),
            'course'            => new CourseResource($this->course)
        ];

    }
}
