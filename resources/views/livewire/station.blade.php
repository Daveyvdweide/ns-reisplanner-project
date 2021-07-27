<div>


    <table class="table">
    <thead>
        <tr>
        <th scope="col">Richting</th>
        <th scope="col">Materieel</th>
        <th scope="col">Vertrektijd</th>
        <th scope="col">Spoor</th>
        <th scope="col">Bekijken</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departures['payload']['departures'] as $departure)
        <tr>
            <td>{{ $departure['direction'] }} 
            </td>
            <td>
            @livewire('trein-small', ['trainnumber' => $departure['product']['number']])
            </td>
            @if(!isset($departure['actualDateTime']))
            <td>Fout bij het ophalen van de tijd</td>
            @else
            <td>{{ substr($departure['actualDateTime'], 11, 5) }}</td>
            @endif

            @if(!isset($departure['plannedTrack']))
            <td>Fout bij het ophalen van het vertrek perron</td>
            @else
            <td>{{ $departure['plannedTrack'] }}</td>
            @endif
            <td><a class="btn" href="/treinen/bekijken/{{ $departure['product']['number'] }}">Bekijk</a></td>
        </tr>
    @endforeach
    </tbody>
</div>
