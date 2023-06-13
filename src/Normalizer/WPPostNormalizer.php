<?php

namespace Jefffairson\WPArticles\Normalizer;

use Spatie\LaravelData\Normalizers\Normalizer;

class WPPostNormalizer implements Normalizer
{
    public function normalize(mixed $value): ?array
    {
        if (! $value instanceof \WP_Post) {
            return null;
        }

        return (array) $value;
    }
}
