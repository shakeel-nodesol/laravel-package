<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?int $parent_id,
        public ?ProductData $product,
        #[DataCollectionOf(CategoryData::class)]
        public ?array $children
    ) {}
}
