@extends('layouts.default')

@section('content')

    @foreach($results as $character)
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" title="{{ $character['name'] }}">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <a href="/character/{{ $character['id'] }}"><strong>{{ $character['name'] }}</strong></a> <small>Status - {{ $character['status'] }}</small>, <small>Species - {{ $character['species'] }}</small>
                        <br/>
                        Origin - {{ $character['origin']['name'] }}
                        <br/>
                        Location - <a href="/location/<?php
                        $locations = explode('/', $character['location']['url']);
                        echo end($locations);
                        ?>">{{ $character['location']['name'] }}</a>
                        <br/>
                        Episodes - <?php
                        foreach($character['episode'] as $episode) { ?><a href="/episode/<?php
                        $episodeIdArr = explode('/', $episode);
                        echo end($episodeIdArr);
                        ?>"><?=end($episodeIdArr) ?></a>,&nbsp;<?php } ?>
                    </p>
                </div>
            </div>
        </article>
    @endforeach

    <div class="buttons">
        <?php
        for($i=1; $i<=$pages; $i++) {
        ?>
            <button class="button <?php if($currentPage === $i){ ?>is-success<?php }else{ ?>is-info<?php } ?> is-rounded is-small" onclick="location.href='{{ url('characters/'.$i) }}'">Page <?= $i ?></button>
        <?php
        }
        ?>
    </div>

@endsection
