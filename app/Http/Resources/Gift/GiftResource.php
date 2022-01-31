<?php

namespace App\Http\Resources\Gift;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftResource extends JsonResource
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
            'type'       => 'gifts',
            'id'         => $this->id,
            'attributes' => [
                'series'           => $this->series,
                'screen'           => $this->screen,
                'memory'           => $this->memory,
                'operation_system' => $this->operation_system,
                'cpu'              => $this->cpu,
                'camera'           => $this->camera,
                'sim'              => $this->sim,
                'battery'          => $this->battery,
                'points'           => $this->points,
                'stock'            => $this->stock,
                'rating'           => $this->getGiftRating(),
                'flag'             => $this->flag,
                'total_reviews'    => $this->total_reviews,
            ]
        ];
    }

    protected function getGiftRating()
    {
        return round($this->rating * 2) / 2;
    }
}
