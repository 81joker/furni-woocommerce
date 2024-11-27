<?php
$hero_title = get_theme_mod('set_hero_title', __('Please, type some title', 'furni'));
$hero_subtitle = get_theme_mod('set_hero_subtitle', __('Please, type some subtitle', 'furni'));
$hero_text = get_theme_mod('set_hero_text', __('Please, type some Text', 'furni'));
$hero_button_link = get_theme_mod('set_hero_button_link', '#');
$hero_button_text = get_theme_mod('set_hero_button_text', __('Learn More', 'furni'));
$hero_background = wp_get_attachment_url(get_theme_mod('set_hero_background'));
// $hero_background_id = get_theme_mod('set_hero_background');
// $hero_background_mime = get_post_mime_type($hero_background_id);
?>
<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>
						<?php
						if ($hero_title) {
							$home_title =  $hero_title;
						} else {
							$home_title =  get_the_title();
						}
						if (is_front_page() || is_home()) {
							echo esc_html($home_title);
						} else {
							esc_html(the_title());
						}
						?>
					</h1>
					<?php if (!(is_shop() || is_cart() || is_checkout())): ?>
						<p class="mb-4"><?php echo $hero_subtitle;?></p>
						<p><a href="<?php echo esc_url($hero_button_link); ?>" class="btn btn-secondary me-2"><?php echo $hero_button_text;?></a><a href="<?php echo $hero_button_link; ?>" class="btn btn-white-outline">Erkunden</a></p>
					<?php endif; ?>
				</div>
			</div>
			<?php if (!(is_shop() || is_cart() || is_checkout())): ?>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="<?php echo esc_url($hero_background) ?>" class="img-fluid">
						<!-- <img src="<?php /* echo get_theme_file_uri('images/couch.png')  */ ?>" class="img-fluid"> -->
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- End Hero Section -->