@extends('layouts.default')

@section('content')

    <form action="{{ route('location.results') }}" method="post">
        @csrf
        Name : <input type="text" name="name" value="{{ $name }}"/><br/><br/>
        Type : <input type="text" name="type" value="{{ $type }}"/><br/><br/>
        Dimension : <input type="text" name="dimension" value="{{ $dimension }}"/><br/><br/>
        <button type="submit">Search</button>
    </form><br/><br/>

    <?php if (!empty($count)) { ?>
    <h1 class="title">{{ $count }} Results</h1>

    @foreach($results as $location)

        <p><a href="/location/{{ $location['id'] }}"><strong>{{ $location['name'] }}</strong></a></p>
        <p>Type - {{ $location['type'] }}</p>
        <p>Dimension - {{ $location['dimension'] }}</p>
        <br/>
        <p>Residents -<?php
            foreach($location['residents'] as $character) { ?><a href="/character/<?php
            $charIdArr = explode('/', $character);
            echo end($charIdArr);
            ?>"><?=end($charIdArr) ?></a>,&nbsp;<?php } ?>
        </p><br/>

    @endforeach
    <?php } ?>

@endsection
