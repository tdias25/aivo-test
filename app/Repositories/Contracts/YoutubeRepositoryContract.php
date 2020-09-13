<?php
namespace App\Repositories\Contracts;

interface YoutubeRepositoryContract
{
    public function findVideosByTerm(string $searchTerm);
}
