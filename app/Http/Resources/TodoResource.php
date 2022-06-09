<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isCompleted' => $this->is_completed,
            'createdAt' => Carbon::parse($this->created_at)->format('d/m/y h:m:s'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('d/m/y h:m:s'),
        ];
    }
}
