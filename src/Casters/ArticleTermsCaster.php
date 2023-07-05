<?php

namespace Jefffairson\WPArticles\Casters;

use Spatie\LaravelData\Casts\Cast;
use Jefffairson\WPArticles\DataObjects\Term;
use Spatie\LaravelData\Support\DataProperty;

class ArticleTermsCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return Term::collection(
            collect(get_terms())
                ->reject(fn (\WP_Term $term) => $term->taxonomy === 'wp_theme')
                ->flatMap(function (\WP_Term $term) use ($context) {
                    return get_the_terms($context['ID'], $term->taxonomy);
                })
        );
    }
}
