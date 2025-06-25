<?php
/**
 * Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Support custom "anchor" values.
$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="'.esc_attr($block['anchor']).'" ';
}

// Create class attribute allowing for custom "className" values.
$class_name = 'as-block-reviews';
if (! empty($block['className'])) {
    $class_name .= ' '.$block['className'];
}

// $title = get_field('title');
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="as-container">
        <?php if (! empty($title)) : ?>
            <h3 class="title">
                <?= $title ?>
            </h3>
        <?php endif ?>
    </div>
</section>