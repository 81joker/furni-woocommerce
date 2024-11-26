<?php

/**
 * Template Name: About 
 */
?>
<?php get_header(); ?>

<?php 
while(have_posts()) {
    the_post();
     ?>
    <div class="container container--narrow page-section position-relative"> 
    <?php
      // $theParent =106;
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
      <?php }
    ?>
  </div>
    <?php 
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if ($theParent or $testArray) { ?>
    <div class="container py-5"> 
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
      <ul class="min-list">
        <?php
          if ($theParent) {
            $findChildrenOf = $theParent;
          } else {
            $findChildrenOf = get_the_ID();
          }

          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $findChildrenOf,
            'sort_column' => 'menu_order'
          ));
        ?>
      </ul>
    </div>
    <?php } ?>
<!-- Start Content Parent  -->
 <?php
 if (!$theParent) {?>
  <?php 
    // Fetch the child pages
    $childPages = get_pages(array(
      'child_of' => $findChildrenOf, 
      'post_type' => 'page', 
      'sort_column' => 'menu_order'
    ));
   ?>

	<!-- Start Blog Section -->
	<div class="blog-section">
			<div class="container">
				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?php echo get_theme_file_uri('images/post-1.jpg') ?>" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

 <?php
 }
?>

<!-- End Content Parent  -->
    <div class="generic-content" style="min-height:300px">
      <?php the_content(); ?>
    </div>

    </div>
  <?php } ?>



<?php get_footer(); ?>