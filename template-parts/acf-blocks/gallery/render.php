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
$class_name = 'as-block-gallery';
if (! empty($block['className'])) {
    $class_name .= ' '.$block['className'];
}

$title = get_field('title');
$gallery = get_field('gallery');
$button = get_field('button');
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="as-container">
        <?php if (! empty($title)) : ?>
            <h3 class="title">
                <?= $title ?>
            </h3>
        <?php endif ?>

        <?php if ($gallery) : ?>
            <div class="gallery">
                <?php foreach ($gallery as $image) : ?>
                    <div class="gallery__item" data-fancybox="gallery" data-aos="zoom-in-up"
                        data-src="<?= wp_get_attachment_url($image); ?>">
                        <?= wp_get_attachment_image($image, 'medium'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="not-found">
                <?php _e('Images not found', 'mhk'); ?>
            </div>
        <?php endif; ?>

        <?php if (! empty($button)) : ?>
            <div class="button">
                <a href="<?= $button['url']; ?>" class="as-button as-button--primary"
                    target="<?= ! empty($button['target']) ? $button['target'] : '_self'; ?>">
                    <?= $button['title']; ?>
                </a>
            </div>
        <?php endif ?>
    </div>
</section>