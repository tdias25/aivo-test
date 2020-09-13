<?php

namespace App\Domain;

class Video
{
    private $id;
    private $title;
    private $description;
    private $published_at;
    private $thumbnail;
    private $channelId;
    private $channelTitle;
    private $videoUrl;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPublishedAt(string $published_at): void
    {
        $this->published_at = $published_at;
    }

    public function getPublishedAt(): string
    {
        return $this->published_at;
    }

    public function setThumbnail(string $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function setChannelId(string $channelId): void
    {
        $this->channelId = $channelId;
    }

    public function getChannelId(): string
    {
        return $this->channelId;
    }

    public function setChannelTitle(string $channelTitle): void
    {
        $this->channelTitle = $channelTitle;
    }

    public function getChannelTitle(): string
    {
        return $this->channelTitle;
    }

    public function setVideoUrl(string $videoUrl): void
    {
        $this->videoUrl = $videoUrl;
    }

    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }
}
