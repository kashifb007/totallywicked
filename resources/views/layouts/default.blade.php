<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ config('app.name', 'Rick and Morty') }}">

    <title><?php if (empty($title)){?>Rick and Morty<?php } else {?>{{ $title }} <?php } ?></title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">
            Rick and Morty
        </h1>
        <p class="subtitle">
            Test by Kashif Bhatti with <strong>Laravel, Guzzle and Bulma</strong>
        </p>
        <h2 class="title">
            <?php if (empty($title)){?>Rick and Morty<?php } else {?>{{ $title }} <?php } ?>
        </h2>
        <a href="/characters">Characters</a><br/><br/>
        <a href="/locations">Locations</a><br/><br/>
        <a href="/episodes">Episodes</a><br/><br/>
        <a href="/characterSearch">Search Characters</a><br/><br/>
        <a href="/locationSearch">Search Locations</a><br/><br/>
        <a href="/episodeSearch">Search Episodes</a><br/><br/>
        @yield('content')
    </div>
</section>
</body>
</html>
