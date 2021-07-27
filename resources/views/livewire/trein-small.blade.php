<div>
    <h5>Materieel: {{ $train['type'] }}<h5> 
        @if(!isset($train['materieeldelen']))
            <span>Afbeelding niet beschikbaar</span>
        @else
            @if(!isset($train['materieeldelen']))
            <span>Afbeelding niet beschikbaar</span>
            @else
                @foreach($train['materieeldelen'] as $materieel)
                    @if(!isset($materieel['bakken']))
                        <span>
                    @else
                        @foreach($materieel['bakken'] as $bak)
                            @if(!isset($bak['afbeelding']['url']))
                
                            @else
                                <img style="float: left" src="{{ $bak['afbeelding']['url'] }}" width="57" height="25">
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endif
</div>

