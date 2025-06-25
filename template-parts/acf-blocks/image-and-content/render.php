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
$class_name = 'as-block-image-and-content';
if (! empty($block['className'])) {
    $class_name .= ' '.$block['className'];
}

$image = get_field('block')['image'];
$tagline = get_field('block')['content']['tagline'];
$title = get_field('block')['content']['title'];
$description = get_field('block')['content']['description'];
$button = get_field('block')['content']['button'];
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="as-container">
        <div class="wrapper">
            <div class="image">
                <?= wp_get_attachment_image($image, 'large'); ?>
            </div>

            <div class="content">
                <?php if (! empty($tagline)) : ?>
                    <div class="tagline">
                        <?= $tagline; ?>
                    </div>
                <?php endif; ?>

                <?php if (! empty($title)) : ?>
                    <h2 class="title">
                        <?= $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if (! empty($description)) : ?>
                    <div class="description">
                        <?= $description; ?>
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
        </div>
</section>