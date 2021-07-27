<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public $stations;

    public function mount()
    {
        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => env('NS_API_KEY_PRIMARY', false),
        ])->get('https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/stations', [
        ]);

        //dd($response->body());
        
        $this->stations = json_decode($response->body(), true);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
