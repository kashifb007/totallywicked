<?php
/**
 * Class ApiService
 * @package App\Http\Services
 * @author Kashif <kash@dreamsites.co.uk>
 * @created 28/10/2020
 */

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class ApiService
{
    public const areas = [
        'character',
        'location',
        'episode'
    ];

    /**
     * @return Client
     */
    public function newClient(): Client
    {
        return new Client([
            'base_uri' => env('BASE_URI'),
            'verify' => false
        ]);
    }

    /**
     * @param string $path
     * @param int|null $id
     * @param int|null $pageId
     * @param string|null $searchString
     * @return array
     */
    public function processOne(string $path, ?int $id, ?int $pageId = 0, ?string $searchString = null): array
    {
        //return info and results arrays from json
        if (in_array($path, self::areas, true)) {
            try {
                if ($id > 0) {
                    $res = $this->newClient()->request('GET', env('BASE_URI') . $path . '/' . $id, []);
                } elseif (!empty($searchString)) {
                    $res = $this->newClient()->request('GET', env('BASE_URI') . $path . '/?' . $searchString, []);
                } elseif ($pageId > 0) {
                    $res = $this->newClient()->request('GET', env('BASE_URI') . $path . '/?page=' . $pageId, []);
                }

                if ($res->getStatusCode() === Response::HTTP_OK) {
                    $arrayContent = json_decode($res->getBody()->getContents(), true);

                    return ['response' => Response::HTTP_OK, 'error' => null, 'data' => $arrayContent];
                }
            } catch (GuzzleException $e) {
                return ['response' => $e->getCode(), 'error' => $e->getMessage()];
            }
        }
        return ['response' => Response::HTTP_INTERNAL_SERVER_ERROR, 'error' => 'Invalid input data'];
    }

}
