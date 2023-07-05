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
        $prefix = '';
        $fields = collect(get_fields($context['ID']))
            ->reject(fn ($value) => $value === false);
        return new AcfFields($fields);
    }
}
