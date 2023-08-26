<?php

namespace App\Helpers;

class JsonResponse{

    public static function response($ok, $data, $msg=null){
        if ($data instanceof \Illuminate\Http\Resources\Json\ResourceCollection) {
            $data = $data->response()->getData(true)['data'];
        }
        return [
            'ok'=>$ok,
            'data'=>$data,
            'message'=>$msg ?? ''
        ];
    }
}