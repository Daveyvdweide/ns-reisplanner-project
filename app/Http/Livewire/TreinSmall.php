<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TreinSmall extends Component
{
    public $train;

    public $journey;

    private string $url;

    public int $trainnumber;

    public function mount()
    {
        $trainnumber = $this->trainnumber;

        $this->url = "https://gateway.apiportal.ns.nl/virtual-train-api/api/v1/trein/" . $trainnumber;


        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => env('NS_API_KEY_PRIMARY', false),
        ])->get($this->url, [
        ]);

        $this->train = json_decode($response->body(), true);


        $responseForJourney = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => env('NS_API_KEY_PRIMARY', false),
        ])->get("https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/journey", [
            'train' => $trainnumber ,
            'dateTime' => now(),
        ]);

        $this->journey = json_decode($responseForJourney->body(), true);
    }

    public function render()
    {
        return view('livewire.trein-small');
    }
}
