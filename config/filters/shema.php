<?php


return [
    'schema' => [

        'product_filter' => [
            'filter' => \App\Services\Filters\CompositeFilter::class,
            'items' => [
                \App\Shop\Products\Filters\ByPriceLow::class,

            ]
        ],

    ]
];

