@extends('layouts.default')

@section('content')

    <h1 class="title">{{ $data['name'] }}</h1>
    <img src="{{ $data['image'] }}" alt="{{ $data['name'] }}" title="{{ $data['name'] }}" />
    <p>Status - {{ $data['status'] }}</p>
    <p>Species - {{ $data['species'] }}</p>
    <p>Origin - {{ $data['origin']['name'] }}</p>
    <p>Location - <a href="/location/<?php
        $locations = explode('/', $data['location']['url']);
        echo end($locations);
        ?>">{{ $data['location']['name'] }}</a>
    </p>
    <p>Episodes -
        Episodes - <?php
        foreach($data['episode'] as $episode) { ?><a href="/episode/<?php
        $episodeIdArr = explode('/', $episode);
        echo end($episodeIdArr);
        ?>"><?=end($episodeIdArr) ?></a>,&nbsp;<?php } ?>
    </p>


@endsection
