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

						<li class="nav-item <?php if (is_shop() ) echo 'active'; ?>">
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
						<li><a class="nav-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><img src="<?php echo get_theme_file_uri('images/cart.svg') ?>"></a></li>
						<li><span class="items text-danger"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span><li>
					</ul>
				</div>
			</div>

		</nav>
		<!-- End Header/Navigation -->