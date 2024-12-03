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
				<li class="wrap-like">
					<a class="nav-link text-white text-center m-auto" href="#">
						<i class="fa fa-heart-o h4" aria-hidden="true"></i>
					</a>
					<?php $liked_products = get_user_liked_products(); ?>
					<!-- St Details like -->
					<div class="details-like">
						<h4 class="fw-bold text-danger"><?php echo empty($liked_products) ? 'Kein Meine Favoriten' : 'Meine Favoriten'; ?></h4>
						<?php if (!empty($liked_products)): ?>
							<?php foreach ($liked_products as $product): ?>
								<div class="card mb-0" style="max-width: 540px;">
									<div class="row">
										<div class="col-md-4 d-flex align-items-center">
											<a href="<?php echo esc_url($product['link']); ?>">
												<img src="<?php echo esc_url($product['image']); ?>" class="img-fluid rounded-start" alt="<?php echo esc_html($product['title']); ?>">
											</a>
										</div>
										<div class="col-md-8 d-flex align-items-center">
											<div class="card-body">
												<a href="<?php echo esc_url($product['link']); ?>">
													<h5 class="card-title"><?php echo esc_html($product['title']); ?></h5>
												</a>
												<p class="card-text"><small class="text-muted">
														<!-- Loop through categories -->
														<?php foreach ($product['categories'] as $category): ?>
															<a href="<?php echo esc_url($category['link']); ?>" class="badge bg-primary text-white me-1">
																<?php echo esc_html($category['name']); ?>
															</a>
														<?php endforeach; ?></small>
													</p>
											</div>
										</div>
									</div>
									<p class="card-text card-price text-end"><small class="text-muted"><?php echo wp_kses_post($product['price']); ?></small></p>
								</div>
								<!-- Repeat cards as needed -->
								<hr>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<!-- En Details like -->
				</li>
				<?php
				$current_user_id = get_current_user_id();

				// Query to get all likes for the current user
				$userLikes = new WP_Query(array(
					'author' => $current_user_id,
					'post_type' => 'like'
				));
				$likeCount = $userLikes->found_posts;
				?>
				<?php if($likeCount): ?>
					<li class="count-number"><span class="items badge rounded-pill bg-light text-black"><?php echo $likeCount; ?></span></li>
				<?php endif; ?>
				<li><a class="nav-link" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="This is the hover text"><img src="<?php echo get_theme_file_uri('images/cart.svg') ?>"></a></li>
				<?php if(WC()->cart->get_cart_contents_count()): ?>
					<li class="count-number"><span class="items badge rounded-pill bg-light text-black"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

</nav>
<!-- End Header/Navigation -->