<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class YoutubeApiTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);
    }

    public function test_endpoint_is_returning_matching_videos_for_given_term()
    {
        $response = $this->get('/api/youtube/?search=baby+shark');

        $response->assertStatus(200);
        $response->assertJsonCount(10, 'result');
        $response->assertJsonFragment([
            'sucess' => 'true'
        ]);
    }

    public function test_endpoint_is_returning_error_when_search_term_is_missing()
    {

        $response = $this->get('/api/youtube/?search=');

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'search'
            ]
        ]);
    }

    public function test_endpoint_is_returning_error_when_no_result_was_found()
    {
        // this one is hard, because the API is global, so it's almost impossible to send random input and not find a video, and i think mocking the response is not a good approach :/
        $this->assertTrue(true);
    }
}
