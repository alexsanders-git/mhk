<?php
$logo = get_field('footer_logo', 'option');
$copyright = get_field('copyright', 'option');
$social_links = get_field('social_links', 'option');
?>

<!-- FOOTER -->
<footer id="as-footer" class="as-footer">
	<div class="as-container">
		<div class="top">
			<div class="logo">
				<a href="<?= home_url('/'); ?>">
					<?= wp_get_attachment_image($logo, 'thumbnail'); ?>
				</a>
				<hr>
			</div>
		</div>

		<div class="center">
			<div class="menu">
				<?php
				wp_nav_menu([
					'theme_location' => 'footer-menu',
					'container' => 'false',
					'menu_class' => 'menu-list',
				]);
				?>
			</div>

			<div class="social">
				<div class="social__title">
					<?php _e('Follow', 'mhk'); ?>
				</div>

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
			</div>
		</div>

		<?php if (! empty($copyright)) : ?>
			<?php
			$placeholders = [
				'year' => date('Y'),
			];

			$copyright = as_message_templates($copyright, $placeholders);
			?>
			<div class="bottom">
				<div class="copyright">
					<?= $copyright; ?>
				</div>
			</div>
		<?php endif; ?>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>