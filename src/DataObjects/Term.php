<?php

namespace Jefffairson\WPArticles\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Jefffairson\WPArticles\DataObjects\Article;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\DataCollectionOf;

class Term extends Data
{
    public function __construct(
        #[MapInputName('term_id')]
        public int $id,
        public string $name,
        public string $slug,
        #[DataCollectionOf(Article::class)]
        public DataCollection|null $articles,
    ) {}
}
