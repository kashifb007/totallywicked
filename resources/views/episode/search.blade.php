@extends('layouts.default')

@section('content')

    <form action="{{ route('episode.results') }}" method="post">
        @csrf
        Name : <input type="text" name="name" value="{{ $name }}"/><br/><br/>
        Episode : <input type="text" name="episode" value="{{ $episode }}"/><br/><br/>
        <button type="submit">Search</button>
    </form><br/><br/>

    <?php if (!empty($count)) { ?>
    <h1 class="title">{{ $count }} Results</h1>

    @foreach($results as $episode)

        <p><a href="/episode/{{ $episode['id'] }}">{{ $episode['name'] }}</a></p>
        <p>Air Date - {{ $episode['air_date'] }}</p>
        <p>Episode - {{ $episode['episode'] }}</p>
        <br/>

    @endforeach
    <?php } ?>

@endsection
