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


					<?php
$liked_products = get_user_liked_products();
?>

<li class="nav-item wrap-like">
    <a class="nav-link text-white text-center m-auto" href="#">
        <i class="fa fa-heart-o h4" aria-hidden="true"></i>
    </a>
    <div class="details-like" id="details-like">
        <h1><?php echo empty($liked_products) ? 'No Liked Products' : 'Liked Products'; ?></h1>
        <?php if (!empty($liked_products)): ?>
            <?php foreach ($liked_products as $product): ?>
				<h1 class="text-danger"><?php echo esc_html($product['price']); ?></h1>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo esc_url($product['image']); ?>" class="card-img-top" alt="<?php echo esc_attr($product['title']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo esc_html($product['title']); ?></h5>
                        <a href="<?php echo esc_url($product['link']); ?>" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</li>

					<!-- Start Like -->
					<?php
					$current_user_id = get_current_user_id();

					// Query to get all likes for the current user
					$userLikes = new WP_Query(array(
						'author' => $current_user_id,
						'post_type' => 'like'
					));

					$likeCount = $userLikes->found_posts; // Total likes for the user
					?>
					<li class="wrap-like">
						<a class="nav-link text-white text-center m-auto" href="#">
							<i class="fa fa-heart-o h4" aria-hidden="true"></i>
						</a>

						<!-- St Details like -->
						<div class="details-like" id="details-like">
        <h3>Meine Favoriten</h3>
		<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 d-flex align-items-center">
      <img src="https://picsum.photos/200/200" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 d-flex align-items-center">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	</div>
</div>
</div>
<p class="card-text text-end" style="font-weight: 500;
    letter-spacing: .025rem;
    line-height: 1.5;"><small class="text-muted">232€</small></p>
</div>
        <!-- Repeat cards as needed -->
		<hr>
    </div>
						<!-- En Details like -->
					</li>
					<li>
						<span class="items text-white"><?php echo $likeCount; ?></span>
					</li>

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