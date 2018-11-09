<?php


return [
    'schema' => [
        'default' => [
            'sorter' => \App\Services\Filters\CompositeSorter::class,
        ],
        'sorter-product' => [
            'sorter' => \App\Services\Filters\CompositeSorter::class,
            'items' => [
                \App\Shop\Products\Sorters\ByCategoryNameSort::class,
                \App\Shop\Products\Sorters\ByPriceLow::class,
            ]
        ],
    ]
];

