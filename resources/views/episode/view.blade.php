@extends('layouts.default')

@section('content')

    <h1 class="title">{{ $data['name'] }}</h1>
    <p>Air Date - {{ $data['air_date'] }}</p>
    <p>Episode - {{ $data['episode'] }}</p>
    <p>Characters -<?php
        foreach($data['characters'] as $character) { ?><a href="/character/<?php
        $charIdArr = explode('/', $character);
        echo end($charIdArr);
        ?>"><?=end($charIdArr) ?></a>,&nbsp;<?php } ?>
    </p>

@endsection
