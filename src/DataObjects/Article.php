<?php

namespace Jefffairson\WPArticles\DataObjects;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Jefffairson\WPArticles\Tools\AcfFields;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\WithCast;
use Jefffairson\WPArticles\DataObjects\Term;
use Spatie\LaravelData\Attributes\MapInputName;
use Jefffairson\WPArticles\Casters\FieldsCaster;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Jefffairson\WPArticles\Casters\ArticleTermsCaster;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Article extends Data
{
    #[Computed]
    public string $link;
    #[Computed]
    public array $thumnail;

    public function __construct(
        #[MapInputName('ID')]
        public int $id,
        #[MapInputName('post_title')]
        public string $title,
        #[
            MapInputName('post_date'),
            WithTransformer(DateTimeInterfaceTransformer::class)
        ]
        public CarbonImmutable $date,
        #[MapInputName('post_excerpt')]
        public string $excerpt,
        #[MapInputName('post_content')]
        public string $content,
        #[MapInputName('post_status')]
        public string $status,
        #[MapInputName('post_type')]
        public string $type,
        #[WithCast(ArticleTermsCaster::class), DataCollectionOf(Term::class)]
        public DataCollection $terms,
        #[WithCast(FieldsCaster::class)]
        public AcfFields $fields,
    ) {
        $this->link = function_exists('get_permalink')
            ? get_permalink($this->id)
            : 'get_permalink does no exists !!' ;
        $this->thumbnail = function_exists('get_the_post_thumbnail')
            ? get_the_post_thumbnail($this->id)
            : 'get_permalink does no exists !!' ;
    }
}
