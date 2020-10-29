@extends('layouts.default')

@section('content')

    <h1 class="title">{{ $data['name'] }}</h1>
    <p>Type - {{ $data['type'] }}</p>
    <p>Dimension - {{ $data['dimension'] }}</p>
    <p>Residents -<?php
        foreach($data['residents'] as $character) { ?><a href="/character/<?php
        $charIdArr = explode('/', $character);
        echo end($charIdArr);
        ?>"><?=end($charIdArr) ?></a>,&nbsp;<?php } ?>
    </p>

@endsection
