<?php

/** Create custom block category */
function as_custom_block_category($categories)
{
    // Adding a new category.
    $new_category = [
        'slug' => 'alex_sanders',
        'title' => 'Alex Sanders'
    ];

    array_splice($categories, 0, 0, array($new_category));

    return $categories;
}

add_filter('block_categories_all', 'as_custom_block_category', 10, 2);


function as_register_acf_blocks()
{
    $blocks = glob(get_template_directory().'/template-parts/acf-blocks/**/block.json');

    foreach ($blocks as $block) {
        register_block_type($block);
    }
}

add_action('init', 'as_register_acf_blocks');