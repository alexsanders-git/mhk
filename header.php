<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo wp_get_document_title(); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<!--
====================================================================
	DEVELOPED BY Alex Sanders
====================================================================
 -->

	<?php
	$logo = get_field('header_logo', 'option');
	$social_links = get_field('social_links', 'option');
	?>

	<div class="as-body-inner">
		<!-- HEADER -->
		<header id="as-header" class="as-header">
			<div class="as-container">
				<div class="wrapper">
					<div class="left">
						<?php if ($social_links) : ?>
							<ul class="social-links">
								<?php foreach ($social_links as $social_link) : ?>
									<li>
										<a href="<?= $social_link['link']; ?>" target="_blank">
											<i class="fa-brands <?= $social_link['social_media']; ?>"></i>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php
						wp_nav_menu([
							'theme_location' => 'header-left-menu',
							'container' => 'false',
							'menu_class' => 'menu-list',
						]);
						?>
					</div>

					<div class="logo">
						<a href="<?= home_url('/'); ?>">
							<?= wp_get_attachment_image($logo, 'thumbnail'); ?>
						</a>
					</div>

					<div class="right">
						<?php
						wp_nav_menu([
							'theme_location' => 'header-right-menu',
							'container' => 'false',
							'menu_class' => 'menu-list',
						]);
						?>

						<div class="button">
							<a href="#!" class="as-button as-button--transparent">
								My Order
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>