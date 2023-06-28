<?php

namespace Jefffairson\WPArticles\Normalizer;

use Spatie\LaravelData\DataCollection;
use Jefffairson\WPArticles\DataObjects\Term;
use Spatie\LaravelData\Normalizers\Normalizer;

class WPPostNormalizer implements Normalizer
{
    public function normalize(mixed $value): ?array
    {
        if (! $value instanceof \WP_Post) {
            return null;
        }

        // This key is not present, force set to use caster afterwards
        $value->terms = collect();

        return (array) $value;
    }
}
