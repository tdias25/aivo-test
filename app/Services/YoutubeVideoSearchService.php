<?php


namespace App\Services;


use App\Helpers\Transformers\YoutubeApiResponseTransformer;
use App\Repositories\YoutubeApiRepository;

class YoutubeVideoSearchService
{
    private $YoutubeApiRepository;

    public function __construct(YoutubeApiRepository $YoutubeApiRepository)
    {
        $this->YoutubeApiRepository = $YoutubeApiRepository;
    }

    public function searchVideo(string $term): ?array
    {
        $result = $this->YoutubeApiRepository->findVideosByTerm($term);

        return YoutubeApiResponseTransformer::toArray($result->getItems());
    }
}
