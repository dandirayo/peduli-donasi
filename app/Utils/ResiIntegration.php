<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class ResiIntegration
{
    public static function getResiStatus($resi) {
        $status = '';

        $kurirUrl = config('app.kurir_sim_url');
        $apiSuffix = '/api/resi/' . $resi;

//        dump($resi);

        $fullUrl = $kurirUrl . $apiSuffix;

        $response = Http::get($fullUrl);

//        dd($response);

        $responseObj = $response->object();

        if($responseObj->data) {
            $status = $responseObj->data->status;
        }

        return $status;
    }
}
