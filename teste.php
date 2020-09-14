<?php

class YoutubeApiRepository implements VideoRepositoryContract
{
    public function search(string $term): ?array
    {
        $YoutubeApi = new YoutubeApi;
        return $YoutubeApi->findVideos('baby shark');
        // return Google_Service_YouTube_SearchResult
    }
}

class VimeoApiRepository implements VideoRepositoryContract
{
    public function search(string $term): ?array
    {
        $VideoApi = new VimeoApiClient;
        return $VideoApi->findAllByTerm('baby shark')
        // return []
    }
}


Interface VideoResponseTransformer
{
    public function transform($rawData): array
}

class YoutubeResponseTransformer implements VideoResponseTransformer
{
    public function transform($rawData) //Google_Service_YouTube_SearchResult
    {
        foreach ($rawData as $video) {
            ....
        }
   }
}

class VimeoResponseTransformer implements VideoResponseTransformer
{
    public function transform($rawData) //Array
    {
        foreach ($rawData as $video) {
            ....
        }
    }
}
