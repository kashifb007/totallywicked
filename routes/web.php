<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'middleware' => 'web',
    'uses' => 'ApiController@showCharacterIndex'
]);

Route::get('/characters/{id?}', [
    'middleware' => 'web',
    'uses' => 'ApiController@showCharacterIndex'
]);

Route::get('/episodes/{id?}', [
    'middleware' => 'web',
    'uses' => 'ApiController@showEpisodeIndex'
]);

Route::get('/locations/{id?}', [
    'middleware' => 'web',
    'uses' => 'ApiController@showLocationIndex'
]);

Route::get('/character/{id}/', [
    'middleware' => 'web',
    'uses' => 'ApiController@showCharacter'
])->where('id', '^[1-9][0-9]*$');

Route::get('/episode/{id}/', [
    'middleware' => 'web',
    'uses' => 'ApiController@showEpisode'
])->where('id', '^[1-9][0-9]*$');

Route::get('/location/{id}/', [
    'middleware' => 'web',
    'uses' => 'ApiController@showLocation'
])->where('id', '^[1-9][0-9]*$');

Route::get('/characterSearch', function() {
    return view('character.search');
});

Route::get('/characterSearch', [
    'middleware' => 'web',
    'uses' => 'ApiController@showCharacterSearch'
]);

Route::post('/characterSearchResults', [
    'middleware' => 'web',
    'uses' => 'ApiController@showCharacterSearchResults'
])->name('character.results');

Route::get('/episodeSearch', [
    'middleware' => 'web',
    'uses' => 'ApiController@showEpisodeSearch'
]);

Route::post('/episodeSearchResults', [
    'middleware' => 'web',
    'uses' => 'ApiController@showEpisodeSearchResults'
])->name('episode.results');

Route::get('/locationSearch', [
    'middleware' => 'web',
    'uses' => 'ApiController@showLocationSearch'
]);

Route::post('/locationSearchResults', [
    'middleware' => 'web',
    'uses' => 'ApiController@showLocationSearchResults'
])->name('location.results');
