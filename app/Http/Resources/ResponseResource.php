<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public static function makeResponse($ok, $data, $message=null){
        return new self([
            'ok' => $ok,
            'data' => $data,
            'message' => $message,
        ]);
     }
    public function toArray($request): array
    {
        //return parent::toArray($request);
        return [
            'ok' => $this['ok'],
        'data' => $this['data'],
        'message' => $this['message'] ?? '',
        ];
    }
}
