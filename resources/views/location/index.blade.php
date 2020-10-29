@extends('layouts.default')

@section('content')

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

    <div class="buttons">
        <?php
        for($i=1; $i<=$pages; $i++) {
        ?>
        <button class="button <?php if($currentPage === $i){ ?>is-success<?php }else{ ?>is-info<?php } ?> is-rounded is-small" onclick="location.href='{{ url('locations/'.$i) }}'">Page <?= $i ?></button>
        <?php
        }
        ?>
    </div>

@endsection
