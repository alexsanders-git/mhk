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

$reviews = get_field('reviews');

if (empty($reviews))
    return;
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="as-container">
        <div class="slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($reviews as $review) : ?>
                        <div class="swiper-slide">
                            <div class="slider__item">
                                <?php if (! empty($review['tagline'])) : ?>
                                    <div class="slider__item-tagline">
                                        <?= $review['tagline']; ?>
                                    </div>
                                <?php endif ?>

                                <?php if (! empty($review['title'])) : ?>
                                    <h3 class="slider__item-title">
                                        <?= $review['title']; ?>
                                    </h3>
                                <?php endif ?>

                                <?php if (! empty($review['content'])) : ?>
                                    <div class="slider__item-content">
                                        <?= $review['content']; ?>
                                    </div>
                                <?php endif ?>

                                <?php if (! empty($review['name'])) : ?>
                                    <div class="slider__item-name">
                                        <?= $review['name']; ?>
                                    </div>
                                <?php endif ?>

                                <?php if (! empty($review['button'])) : ?>
                                    <div class="button">
                                        <a href="<?= $review['button']['url']; ?>" class="as-button as-button--primary"
                                            target="<?= ! empty($review['button']['target']) ? $review['button']['target'] : '_self'; ?>">
                                            <?= $review['button']['title']; ?>
                                        </a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>