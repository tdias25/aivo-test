<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Services\Contracts\VideoSearchServiceContract;

class YoutubeController extends Controller
{
    public function search(SearchRequest $request, VideoSearchServiceContract $VideoSearchService)
    {
        try {
            return response()->json([
                'sucess' => 'true',
                'result' => $VideoSearchService->searchVideo($request->search)
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'sucess' => 'false',
                'message' => $th->getMessage()
            ], 404);
        }
    }
}
