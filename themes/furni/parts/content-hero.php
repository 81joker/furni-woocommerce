	<!-- Start Hero Section -->
	<div class="hero">
	    <div class="container">
	        <div class="row justify-content-between">
	            <div class="col-lg-5">
	                <div class="intro-excerpt">
	                    <h1><?php echo the_title() ?></h1>
						<?php if ( !( is_shop() || is_cart() || is_checkout())): ?>
	                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
	                    <p><a href="<?php echo get_permalink(10); ?>" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
						<?php endif;?>
	                </div>
	            </div>
				<?php if ( !( is_shop() || is_cart() || is_checkout())): ?>
	            <div class="col-lg-7">
	                <div class="hero-img-wrap">
	                    <img src="<?php echo get_theme_file_uri('images/couch.png') ?>" class="img-fluid">
	                </div>
	            </div>
			  <?php endif;?>
	        </div>
	    </div>
	</div>
	<!-- End Hero Section -->