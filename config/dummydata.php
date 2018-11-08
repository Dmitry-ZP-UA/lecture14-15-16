<?php

return [

    /*
     * Categories
     */

    'categories' => [
        1 => [
            'id'            => 1,
            'parent_id'     => 0,
            'name'          => 'Category 1',
            'slug'          => 'category-1',
            'description'   => 'Category 1 Description',
        ],
        2 => [
            'id'            => 2,
            'parent_id'     => 0,
            'name'          => 'Category 2',
            'slug'          => 'category-2',
            'description'   => 'Category 2 Description',
        ],
        3 => [
            'id'            => 3,
            'parent_id'     => 1,
            'name'          => 'Category 1 Child 1',
            'slug'          => 'category-1-child-1',
            'description'   => 'Category 1 Child 1 Description',
        ],
        4 => [
            'id'            => 4,
            'parent_id'     => 1,
            'name'          => 'Category 1 Child 2',
            'slug'          => 'category-1-child-2',
            'description'   => 'Category 1 Child 2 Description',
        ],
    ],

    /*
     * Products
     */

    'products' => [
        1 => [
            'id'            => 1,
            'category_id'   => 1,
            'name'          => 'Product 1',
            'slug'          => 'product-1',
            'description'   => 'Description 1',
            'cover'         => 'product.png',
            'quantity'      => 1,
            'price'         => 1.5,
            'status'        => 1
        ],
        2 => [
            'id'            => 2,
            'category_id'   => 3,
            'name'          => 'Product 2',
            'slug'          => 'product-2',
            'description'   => 'Description 2',
            'cover'         => 'product.png',
            'quantity'      => 1,
            'price'         => 1.5,
            'status'        => 1
        ]
    ],

    /*
     * Product Images
     */

    'product_images' => [
        1 => [
            'id'            => 1,
            'product_id'    => 1,
            'src'          => 'product1.jpg'
        ],
        2 => [
            'id'            => 2,
            'product_id'    => 2,
            'src'          => 'product1.jpg'
        ]
    ]

];