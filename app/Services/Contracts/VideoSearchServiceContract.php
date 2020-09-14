<?php

namespace App\Services\Contracts;

interface VideoSearchServiceContract
{
    public function searchVideo(string $term): array;
}
