<?php

namespace Jefffairson\WPArticles\Casters;

use Spatie\LaravelData\Casts\Cast;
use Jefffairson\WPArticles\Tools\AcfFields;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class FieldsCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        $key = '';
        if (isset($properties['term_id'])) {
            $key = $properties['taxonomy'] . '_' . $properties['term_id'];
        }

        if (isset($properties['ID'])) {
            $key = $properties['ID'];
        }

        $fields = collect(get_fields($key))
            ->reject(fn ($value) => $value === false);

        return new AcfFields($fields);
    }
}
