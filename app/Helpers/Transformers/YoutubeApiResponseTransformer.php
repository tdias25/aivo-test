<?php

namespace App\Helpers\Transformers;

class YoutubeApiResponseTransformer
{
    public static function toArray(array $rawData): array
    {
        $collection = [];

        foreach ($rawData as $video) {

            $snippetInfo = $video->getSnippet();

            $collection[] = [
                'published_at' => $snippetInfo->getPublishedAt(),
                'id' => $video->getId()->getVideoId(),
                'title' => $snippetInfo->getTitle(),
                'description' => $snippetInfo->getDescription(),
                'thumbnail' => $snippetInfo->getThumbnails()[0],
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
