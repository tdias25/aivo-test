<?php

namespace App\Helpers\Transformers;

interface VideoTransformerContract
{
    public function transform(array $videoDa);
}
