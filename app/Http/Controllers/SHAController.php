<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SHAController extends Controller
{
     public function homabay()
    {
        $url = "https://api.dha.go.ke/v3/hfr/facility-search?search_term=&county=HOMA%20BAY&facility_level=&facility_owner_type=&page=1&page_size=20&agent=AFYANGU-00030";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'User-Agent' => 'Mozilla/5.0',  // simulate browser
        ])->get($url);

        dd($response->json());
    }
}