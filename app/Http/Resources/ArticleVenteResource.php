<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleVenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'libelle' => $this->libelle,
            'prix' => $this->prix,
            'promo' => $this->promo,
            'marge' => $this->marge,
            'stock' => $this->stock,
            'categorie_id' => $this->categorie_id,
            'ref' => $this->ref,
            'image' => $this->image,
            'confection' => $this->confections->map(function ($confection) {
                return [
                    'id' => $confection->article_confection->id,
                    'libelle' => $confection->article_confection->libelle,
                    'quantite' => $confection->quantite,
                ];
            }),
        ];

    }
}
