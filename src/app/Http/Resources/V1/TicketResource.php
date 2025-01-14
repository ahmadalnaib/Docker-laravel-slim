<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'ticket',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->when(
                    $request->routeIs('tickets.show'),
                    $this->description
                ),
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'author'=>[
                    'data'=>[
                        'type'=>'user',
                        'id'=>$this->user_id
                    ],
                    'links'=>[
                        'self'=> route('users.show', ['user' => $this->user_id])
                    ]
                ]
            ],
            'include'=> new UserResource($this->whenLoaded('author')),
            'links' => [
                'self' => route('tickets.show', ['ticket' => $this->id]),
            ],
        ];
    }
}
