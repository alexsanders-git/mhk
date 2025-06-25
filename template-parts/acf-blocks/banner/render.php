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
$class_name = 'as-block-banner';
if (! empty($block['className'])) {
    $class_name .= ' '.$block['className'];
}

$slider = get_field('slider');
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($slider as $slide) : ?>
                <div class="swiper-slide">
                    <div class="slide">
                        <div class="slide__image">
                            <?= wp_get_attachment_image($slide['background_image'], 'full'); ?>
                        </div>
                        <div class="slide__content">
                            <div class="as-container">
                                <div class="slide__wrapper">
                                    <?php if (! empty($slide['tagline'])) : ?>
                                        <div class="slide__tagline">
                                            <?= $slide['tagline']; ?>
                                        </div>
                                    <?php endif ?>

                                    <h1 class="slide__title">
                                        <?= $slide['title']; ?>
                                    </h1>

                                    <?php if (! empty($slide['button'])) : ?>
                                        <div class="button">
                                            <a href="<?= $slide['button']['url']; ?>" class="as-button as-button--primary"
                                                target="<?= ! empty($slide['button']['target']) ? $slide['button']['target'] : '_self'; ?>">
                                                <?= $slide['button']['title']; ?>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>