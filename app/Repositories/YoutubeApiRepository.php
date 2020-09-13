<?php

namespace App\Repositories;

use App\Exceptions\Videos\VideosNotFoundException;
use App\Helpers\Transformers\YoutubeApiResponseTransformer;
use App\Repositories\Contracts\YoutubeRepositoryContract;
use Google_Client;
use Google_Service_YouTube;

class YoutubeApiRepository implements YoutubeRepositoryContract
{
    private $youtubeClient;
    private $apiKey = 'AIzaSyCT2KHReASseef9HbVaffWPiNZ_bmKLs7o';
    private $searchType = 'video';
    private $maxResults = 10;
    private $order = 'date';

    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey($this->apiKey);

        $this->youtubeClient = new Google_Service_YouTube($client);
    }

    public function findVideosByTerm(string $searchTerm): ?array
    {
        $result = $this->youtubeClient
            ->search
            ->listSearch('id,snippet', [
                'q' => $searchTerm,
                'maxResults' => $this->maxResults,
                'order' => $this->order,
                'type' => $this->searchType
            ]);

        if (empty($result->getItems())) {
            throw new VideosNotFoundException('no result was found for the given search term');
        }

        return YoutubeApiResponseTransformer::toArray($result->getItems());
    }
}
