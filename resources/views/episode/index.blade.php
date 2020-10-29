@extends('layouts.default')

@section('content')

    @foreach($results as $episode)

        <p><a href="/episode/{{ $episode['id'] }}">{{ $episode['name'] }}</a></p>
        <p>Air Date - {{ $episode['air_date'] }}</p>
        <p>Episode - {{ $episode['episode'] }}</p>
        <br/>

    @endforeach

    <div class="buttons">
        <?php
        for($i=1; $i<=$pages; $i++) {
        ?>
        <button class="button <?php if($currentPage === $i){ ?>is-success<?php }else{ ?>is-info<?php } ?> is-rounded is-small" onclick="location.href='{{ url('episodes/'.$i) }}'">Page <?= $i ?></button>
        <?php
        }
        ?>
    </div>

@endsection
