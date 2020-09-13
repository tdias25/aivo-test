<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Repositories\YoutubeApiRepository;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function search(SearchRequest $request)
    {
        try {

            $YoutubeAPI = new YoutubeApiRepository();

            return response()->json([
                'sucess' => 'true',
                'result' => $YoutubeAPI->findVideosByTerm($request->search)
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'sucess' => 'false',
                'message' => $th->getMessage()
            ], 404);
        }
    }
}
