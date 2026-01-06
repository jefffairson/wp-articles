<?php

namespace Jefffairson\WPArticles\Casters;

use Spatie\LaravelData\Casts\Cast;
use Jefffairson\WPArticles\DataObjects\Term;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class ArticleTermsCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        return Term::collect(
            collect(get_terms())
                ->reject(fn (\WP_Term $term) => $term->taxonomy === 'wp_theme')
                ->flatMap(fn (\WP_Term $term) => get_the_terms($properties['ID'], $term->taxonomy))
        );
    }
}
