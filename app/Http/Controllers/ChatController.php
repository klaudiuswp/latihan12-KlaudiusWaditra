<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    protected $geminiservice;

    // public function __construct(GeminiService $geminiservice)
    // {
    //     $this->$geminiservice = $geminiservice;
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chat');
    }

    public function handleChat(Request $request)
    {
        $input = $request->input('message');
        $url = env('GEMINI_API_BASE_URL') . "?key=" . env('GEMINI_API_KEY');

        $payload = [
            "contents" => [
                "role" => "user",
                "parts" => [
                    "text" => $input
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        $geminiRespones = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'no respones';
        // dd($geminiRespones);
        return redirect()->back()->with('response', $geminiRespones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
