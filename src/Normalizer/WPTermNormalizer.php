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

        // These key are not present, force set to use caster (or other) afterwards
        $value->fields = collect();

        return (array) $value;
    }
}
