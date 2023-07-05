<?php

namespace Jefffairson\WPArticles\Casters;

use Spatie\LaravelData\Casts\Cast;
use Jefffairson\WPArticles\Tools\AcfFields;
use Jefffairson\WPArticles\DataObjects\Term;
use Spatie\LaravelData\Support\DataProperty;

class FieldsCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        $key = '';
        if (isset($context['term_id'])) {
            $key = $context['taxonomy'] . '_' . $context['term_id'];
        }

        if (isset($context['ID'])) {
            $key = $context['ID'];
        }

        $fields = collect(get_fields($key))
            ->reject(fn ($value) => $value === false);

        return new AcfFields($fields);
    }
}
