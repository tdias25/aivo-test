<?php

namespace App\Helpers\Transformers;

interface VideoResponseTransformer
{
    public function toArray($rawData): array;
}
