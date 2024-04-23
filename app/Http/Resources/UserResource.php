<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\PlanningResource;
use App\Models\Planning;

class UserResource extends JsonResource
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
            'id'        => $this->id,
            'username'  => $this->username,
            'idcard'    => $this->idcard,
            'phone'     => $this->phone,
            'actived'   => $this->actived,
            'name'      => $this->name,
            'email'     => $this->email,
            /* 'password'  => $this->password, */
            /* 'courses' => CourseResource::collection($this->whenLoaded('courses')) */
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
            /* 'plannings' => PlanningResource::collection($this->whenLoaded('courses')) */
            'plannings' => PlanningResource::collection($this->whenLoaded('plannings'))
            /* 'courses' =>  new CourseResource($this->courses) */
        ];
    }
}
