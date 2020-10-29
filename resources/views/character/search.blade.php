@extends('layouts.default')

@section('content')

    <form action="{{ route('character.results') }}" method="post">
        @csrf
        Name : <input type="text" name="name" value="{{ $name }}"/><br/><br/>
        Status : <select name="status">
            <option value="alive">alive</option>
            <option value="dead">dead</option>
            <option value="unknown">unknown</option>
        </select><br/><br/>
        Species : <input type="text" name="species" value="{{ $species }}"/><br/><br/>
        Type : <input type="text" name="type" value="{{ $type }}"/><br/><br/>
        Gender : <select name="gender">
            <option value="female">female</option>
            <option value="male">male</option>
            <option value="genderless">genderless</option>
            <option value="unknown">unknown</option>
        </select><br/><br/>
        <button type="submit">Search</button>
    </form><br/><br/>

    <?php if (!empty($count)) { ?>
    <h1 class="title">{{ $count }} Results</h1>

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
    <?php } ?>

@endsection
