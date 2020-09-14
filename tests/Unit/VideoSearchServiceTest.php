<?php

namespace Tests\Unit;

use App\Exceptions\Videos\VideosNotFoundException;
use App\Repositories\YoutubeApiRepository;
use App\Services\VideoSearchService;
use PHPUnit\Framework\TestCase;

class VideoSearchServiceTest extends TestCase
{

    public function test_it_should_throw_an_exception_when_no_video_was_found()
    {
        $this->expectException(VideosNotFoundException::class);

        $YoutubeApiRepositoryMock = $this->createMock(YoutubeApiRepository::class);
        $YoutubeApiRepositoryMock->method('findVideosByTerm')
            ->willReturn([]);

        $VideoSearchService = new VideoSearchService($YoutubeApiRepositoryMock);
        $VideoSearchService->searchVideo('baby shark');
    }

    public function test_it_should_return_an_array_when_videos_were_found()
    {
        $YoutubeApiRepositoryMock = $this->createMock(YoutubeApiRepository::class);
        $YoutubeApiRepositoryMock->method('findVideosByTerm')
            ->willReturn([
                [
                    'published_at' => '2020-09-13T18:43:58Z',
                    'id' => 'ID',
                    'title' => 'TITLE',
                    'description' => 'DESCRIPTION',
                    'thumbnail' => 'THUMBNAIL',
                    'extra' => [
                        'channel_id' => 'CHANNEL_ID',
                        'channel_title' => 'CHANNEL_TITLE',
                        'video_url' => 'VIDEO_URLt'
                    ]
                ]
            ]);

        $VideoSearchService = new VideoSearchService($YoutubeApiRepositoryMock);
        $result = $VideoSearchService->searchVideo('baby shark');

        $this->assertCount(1, $result);
        $this->assertArrayHasKey('published_at', $result[0]);
        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('title', $result[0]);
        $this->assertArrayHasKey('description', $result[0]);
        $this->assertArrayHasKey('thumbnail', $result[0]);
        $this->assertArrayHasKey('extra', $result[0]);
    }

}
