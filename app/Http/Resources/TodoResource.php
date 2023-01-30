<?php

namespace App\Http\Resources;

use App\Models\Todo;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Todo
 */
class TodoResource extends JsonResource
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
            'description' => $this->description,
            'owned_by' => $this->user,
            'project' => $this->project,
            'status' => $this->todoStatus->name,
            'view_counter' => $this->view_counter,
        ];
    }
}
