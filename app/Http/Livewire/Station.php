<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Station extends Component
{
    public $departures;

    public function mount(Request $request)
    {
        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => env('NS_API_KEY_PRIMARY', false),
        ])->get('https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/departures', [
            'lang' => 'nl',
            'uicCode' => $request->route('uicode'),
            'dateTime' => now(),
            'maxJourneys' => 10,
        ]);

        $this->departures = json_decode($response->body(), true);
    }

    public function render()
    {
        return view('livewire.station');
    }
}
