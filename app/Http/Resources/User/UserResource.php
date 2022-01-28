<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'       => 'users',
            'id'         => $this->id,
            'attributes' => [
                'fullname'  => $this->fullname,
                'username'  => $this->username,
                'points'    => $this->points,
                'roles'     => $this->roles,
                'api_token' => $this->api_token,
            ]
        ];
    }
}
