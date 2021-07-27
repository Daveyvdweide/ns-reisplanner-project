<div>
    <h3>Materieel<h3>
        @if(!isset($train['materieeldelen']))
            <p>Afbeelding niet beschikbaar</p>
        @else
            @foreach($train['materieeldelen'] as $materieel)
                @foreach($materieel['bakken'] as $bak)
                    <img src="{{ $bak['afbeelding']['url'] }}" width="115" height="50">
                @endforeach
            @endforeach
        @endif
    <h3>Type: {{ $train['type'] }} </h3>
    <h3>Vervoerder: {{ $train['vervoerder'] }} </h3>
    <h3>Aantal wagons: {{ $train['lengte']}} </h3>
    <h3>Lengte in meters: {{ $train['lengteInMeters']}} </h3>

    <table class="table" id="stationTable">
        <thead>
            <tr>
            <th scope="col">Station</th>
            <th scope="col">Vertrek/aankomst tijd</th>
            </tr>
        </thead>
        <tbody>
        @foreach($journey['payload']['stops'] as $stops)
            <tr>
                <td>{{ $stops['stop']['name'] }}</td>
                @if(!isset($stops['departures'][0]['plannedTime']))
                <td>De vertrektijd bij dit station is niet beschikbaar</td>
                @else
                <td>{{ $stops['departures'][0]['plannedTime'] }}</td>
                @endif
            </tr>
        @endforeach
        </tbody>


</div>
