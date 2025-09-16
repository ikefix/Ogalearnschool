<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $phone   = $request->input('phone', '+2349152150124');  // default test number
        $message = $request->input('message', 'Hello from Laravel without SDK!');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('CRUNCHZAPP_CHANNEL_TOKEN'),
        ])->post('https://api.crunchz.app/message/send', [
            'to'   => $phone,
            'body' => $message,
        ]);

        return response()->json($response->json());
    }
}