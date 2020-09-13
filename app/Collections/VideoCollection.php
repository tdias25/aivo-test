<?php

namespace App\Collections;

use App\Domain\Video;

class VideoCollection implements \Iterator, \Countable, \JsonSerializable
{
    private $videos = [];

    public function __construct(Video ...$video)
    {
        $this->videos = $video;
    }

    public function addVideo(Video $video)
    {
        $this->videos[] = $video;
    }
}
