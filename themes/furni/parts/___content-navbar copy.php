<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

	<div class="container">
		<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">Furni<span>.</span></a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsFurni">
			<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
				<li class="nav-item <?php if (is_page('home') || wp_get_post_parent_id(0) == 16) echo 'active'; ?>">

					<a class="nav-link " href="<?php echo esc_url(home_url('/')); ?>">
						Home
					</a>

				</li>

				<li class="nav-item <?php if (is_shop()) echo 'active'; ?>">
					<a class="nav-link " href="<?php echo site_url('/shop'); ?>">
						Shop
					</a>
				</li>
				<li class="nav-item <?php if (is_page('about') || wp_get_post_parent_id(0) == 9) echo 'active'; ?>">
					<a class="nav-link " href="<?php echo site_url('/about'); ?>">
						About
					</a>
				</li>
				<li class="nav-item <?php if (is_page('services') || wp_get_post_parent_id(0) == 16) echo 'active'; ?>">
					<a class="nav-link " href="<?php echo site_url('/services'); ?>">
						Services
					</a>
				</li>
				<li class="nav-item <?php if (is_page('blog') || wp_get_post_parent_id(0) == 16) echo 'active'; ?>">
					<a class="nav-link " href="<?php echo site_url('/blog'); ?>">
						Blog
					</a>
				</li>
				<li class="nav-item <?php if (is_page('contact') || wp_get_post_parent_id(0) == 16) echo 'active'; ?>">
					<a class="nav-link " href="<?php echo site_url('/contact'); ?>">
						Kontant
					</a>
				</li>
			</ul>

			<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
				<li><a class="nav-link" href="#"><img src="<?php echo get_theme_file_uri('images/user.svg') ?>"></a></li>





				<?php if (is_user_logged_in()): ?>
					<!-- Strt Like -->
					<?php
					$existStatus = 'no';
					$login_authors = [];

					$likeAutor = new WP_Query(array(
						'post_type' => 'like'
					));

					// Collect post authors
					if ($likeAutor->have_posts()) {
						while ($likeAutor->have_posts()) {
							$likeAutor->the_post();
							$login_authors[] = $likeAutor->post->post_author;
						}
						wp_reset_postdata();
					}

					// Query to count likes for the current post
					$likeCount = new WP_Query(array(
					    'post_type' => 'like',
					    'meta_query' => array(
					        array(
					            'key' => 'liked_professor_id',
					            'compare' => '=',
					            'value' => get_the_ID()
					        )
					    )
					));

					if (is_user_logged_in()) {
						$current_user_id = get_current_user_id();

						if (in_array($current_user_id, $login_authors)) {
							$existQuery = new WP_Query(array(
								'author' => $current_user_id,
								'post_type' => 'like',
								'meta_query' => array(
									array(
										'key' => 'liked_professor_id',
										'compare' => '=',
										'value' => get_the_ID()
									)
								)
							));

							if ($existQuery->found_posts) {
								$existStatus = 'yes';
							}
						}
					}
					?>
					<li>
						<a class="nav-link text-white text-center m-auto" href="#">
							<i class="fa fa-heart-o h4" aria-hidden="true"></i>
						</a>
						<!-- <span>Merkliste</span> -->
					</li>
					<li><span class="items text-white"><?php  echo $likeCount->found_posts; ?></span>
					<li>

						<!-- End Like -->
					<?php endif; ?>






					<li><a class="nav-link" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="This is the hover text"><img src="<?php echo get_theme_file_uri('images/cart.svg') ?>"></a></li>
					<li><span class="items text-white"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
					<li>
			</ul>
		</div>
	</div>

</nav>
<!-- End Header/Navigation -->