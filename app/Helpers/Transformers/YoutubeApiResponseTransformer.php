<?php

namespace App\Helpers\Transformers;

class YoutubeApiResponseTransformer implements VideoResponseTransformer
{
    public function toArray($rawData): array
    {
        $collection = [];

        foreach ($rawData as $video) {

            $snippetInfo = $video->getSnippet();

            $collection[] = [
                'published_at' => $snippetInfo->getPublishedAt(),
                'id' => $video->getId()->getVideoId(),
                'title' => $snippetInfo->getTitle(),
                'description' => $snippetInfo->getDescription(),
                'thumbnail' => $snippetInfo->getThumbnails()['high']['url'],
                'extra' => [
                    'channel_id' => $snippetInfo->getChannelId(),
                    'channel_title' => $snippetInfo->getChannelTitle(),
                    'video_url' => 'https://youtu.be/' . $video->getId()->getVideoId()
                ]
            ];
        }

        return $collection;

    }
}
