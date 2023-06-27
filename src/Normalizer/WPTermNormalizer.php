<?php

namespace Jefffairson\WPArticles\Normalizer;

use Spatie\LaravelData\Normalizers\Normalizer;

class WPTermNormalizer implements Normalizer
{
    public function normalize(mixed $value): ?array
    {
        if (! $value instanceof \WP_Term) {
            return null;
        }

        return (array) $value;
    }
}
