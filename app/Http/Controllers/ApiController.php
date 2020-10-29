<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiService;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller
{
    /**
     * @var ApiService
     */
    private $apiService;

    /**
     * ApiController constructor.
     * @param ApiService $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCharacterSearch()
    {
        return view('character.search', [
                'name' => null,
                'species' => null,
                'type' => null,
                'count' => null,
                'results' => null,
                'title' => 'Characters Search'
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showEpisodeSearch()
    {
        return view('episode.search', [
                'name' => null,
                'episode' => null,
                'title' => 'Episode Search',
                'count' => null,
                'results' => null
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showLocationSearch()
    {
        return view('location.search', [
                'name' => null,
                'dimension' => null,
                'type' => null,
                'title' => 'Locations Search',
                'count' => null,
                'results' => null
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showCharacterSearchResults(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'string|nullable',
                'status' => 'string|nullable|in:alive,dead,unknown',
                'species' => 'string|nullable',
                'type' => 'string|nullable',
                'gender' => 'string|in:female,male,genderless,unknown'
            ]
        );

        $data = $this->apiService->processOne('character', null, null, http_build_query($validator->valid()));

        return view('character.search', [
                'name' => $validator->valid()['name'],
                'species' => $validator->valid()['species'],
                'type' => $validator->valid()['type'],
                'title' => 'Character Search Results - Rick and Morty',
                'count' => $data['data']['info']['count'] ?? null,
                'results' => $data['data']['results'] ?? null
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showLocationSearchResults(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'string|nullable',
                'dimension' => 'string|nullable',
                'type' => 'string|nullable'
            ]
        );

        $data = $this->apiService->processOne('location', null, null, http_build_query($validator->valid()));

        return view('location.search', [
                'name' => $validator->valid()['name'],
                'dimension' => $validator->valid()['dimension'],
                'type' => $validator->valid()['type'],
                'title' => 'Location Search Results - Rick and Morty',
                'count' => $data['data']['info']['count'] ?? null,
                'results' => $data['data']['results'] ?? null
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showEpisodeSearchResults(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'string|nullable',
                'episode' => 'string|nullable',
            ]
        );

        $data = $this->apiService->processOne('episode', null, null, http_build_query($validator->valid()));

        return view('episode.search', [
                'name' => $validator->valid()['name'],
                'episode' => $validator->valid()['episode'],
                'title' => 'Episode Search Results - Rick and Morty',
                'count' => $data['data']['info']['count'] ?? null,
                'results' => $data['data']['results'] ?? null
            ]
        );
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCharacterIndex(int $id = 1)
    {
        $data = $this->apiService->processOne('character', null, $id);

        return view('character.index', [
                'title' => 'Character Index - Rick and Morty',
                'currentPage' => $id,
                'pages' => $data['data']['info']['pages'],
                'count' => $data['data']['info']['count'],
                'next' => $data['data']['info']['next'],
                'results' => $data['data']['results']
            ]
        );

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLocationIndex(int $id = 1)
    {
        $data = $this->apiService->processOne('location', null, $id);

        $test = $data;

        return view('location.index', [
                'title' => 'Location Index',
                'currentPage' => $id,
                'pages' => $data['data']['info']['pages'],
                'count' => $data['data']['info']['count'],
                'next' => $data['data']['info']['next'],
                'results' => $data['data']['results']
            ]
        );

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEpisodeIndex(int $id = 1)
    {
        $data = $this->apiService->processOne('episode', null, $id);

        return view('episode.index', [
                'title' => 'Episode Index',
                'currentPage' => $id,
                'pages' => $data['data']['info']['pages'],
                'count' => $data['data']['info']['count'],
                'next' => $data['data']['info']['next'],
                'results' => $data['data']['results']
            ]
        );

    }

    /**
     * @param int $id Character ID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showCharacter(int $id)
    {
        $data = $this->apiService->processOne('character', $id);

        return view('character.view', [
                'data' => $data['data'],
                'title' => $data['data']['name']
            ]
        );
    }

    /**
     * @param int $id Location ID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLocation(int $id)
    {
        $data = $this->apiService->processOne('location', $id);

        return view('location.view', [
                'data' => $data['data'],
                'title' => $data['data']['name']
            ]
        );
    }

    /**
     * @param int $id Episode ID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEpisode(int $id)
    {
        $data = $this->apiService->processOne('episode', $id);

        return view('episode.view', [
                'data' => $data['data'],
                'title' => $data['data']['name']
            ]
        );
    }
}
