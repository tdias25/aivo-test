<?php
namespace App\Repositories\Contracts;

use App\Helpers\Transformers\VideoResponseTransformer;

interface VideoRepositoryContract
{
    public function __construct(VideoResponseTransformer $transformer);
    public function findVideosByTerm(string $searchTerm);
}
