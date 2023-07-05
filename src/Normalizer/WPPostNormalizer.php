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

        // These key are not present, force set to use caster (or other) afterwards
        $value->terms = collect();
        $value->fields = collect();

        return (array) $value;
    }
}
