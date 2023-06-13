<?php

namespace Jefffairson\WPArticles\DataObjects;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Article extends Data
{
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
    ) {}
}
