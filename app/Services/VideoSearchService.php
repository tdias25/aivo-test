<?php

namespace App\Services;

use App\Exceptions\Videos\VideosNotFoundException;
use App\Repositories\Contracts\VideoRepositoryContract;
use App\Services\Contracts\VideoSearchServiceContract;

class VideoSearchService implements VideoSearchServiceContract
{
    private $VideoRepository;

    public function __construct(VideoRepositoryContract $VideoRepository)
    {
        $this->VideoRepository = $VideoRepository;
    }

    public function searchVideo(string $term): array
    {
        $result = $this->VideoRepository->findVideosByTerm($term);

        if (empty($result)) {
            throw new VideosNotFoundException('no result was found for the given search term');
        }

        return $result;
    }
}
