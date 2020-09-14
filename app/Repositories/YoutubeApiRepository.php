<?php

namespace App\Repositories;

use App\Helpers\Transformers\VideoResponse;
use App\Helpers\Transformers\VideoResponseTransformer;
use App\Repositories\Contracts\VideoRepositoryContract;
use Google_Client;
use Google_Service_YouTube;

class YoutubeApiRepository implements VideoRepositoryContract
{
    /**
     * @var Google_Service_YouTube
     */
    private $youtubeClient;

    /**
     * @var VideoResponseTransformer
     */
    private $transformer;

    public function __construct(VideoResponseTransformer $transformer)
    {
        $client = new Google_Client();
        $client->setDeveloperKey(env('YOUTUBE_API_KEY'));

        $this->youtubeClient = new Google_Service_YouTube($client);
        $this->transformer = $transformer;
    }

    public function findVideosByTerm(string $searchTerm): array
    {
        $result = $this->youtubeClient
            ->search
            ->listSearch('id,snippet', [
                'q' => $searchTerm,
                'maxResults' => env('YOUTUBE_API_MAX_RESULTS', 10),
                'order' => env('YOUTUBE_API_ORDER_BY', 'date'),
                'type' => env('YOUTUBE_API_RESOURCE_TYPE', 'video')
            ])
            ->getItems();

        return $this->transformer->toArray($result);
    }
}
