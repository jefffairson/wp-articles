<?php

namespace Jefffairson\WPArticles\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Jefffairson\WPArticles\DataObjects\Article;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\DataCollectionOf;

class TermWithArticles extends Data
{
    #[Computed]
    public string $link;

    public function __construct(
        #[MapInputName('term_id')]
        public int $id,
        public string $name,
        public string $slug,
        public string $taxonomy,
        #[DataCollectionOf(Article::class)]
        public DataCollection|null $articles,
    ) {
        $this->link = function_exists('get_term_link')
            ? get_term_link($this->id, $this->taxonomy)
            : 'get_term_link does no exists !!' ;
    }
}
