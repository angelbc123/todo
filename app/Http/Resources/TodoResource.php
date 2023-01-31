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
            'owned_by' => $this->whenLoaded('ownedBy'),
            'project' => $this->whenLoaded('project'),
            'status' => $this->whenLoaded('todoStatus'),
            'view_counter' => $this->view_counter,
        ];
    }
}
