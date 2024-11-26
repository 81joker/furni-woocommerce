<?php

/**
 * Template Name: About 
 */
?>
<?php get_header(); ?>
<?php 
while(have_posts()) :
    the_post();
    $theParent = wp_get_post_parent_id(get_the_ID());
    if ($theParent) {
      $findChildrenOf = $theParent;
    } else {
      $findChildrenOf = get_the_ID();
    }

    // wp_list_pages(array(
    //   'title_li' => NULL,
    //   'child_of' => $findChildrenOf,
    //   'sort_column' => 'menu_order'
    // ));
     ?>
  <?php if (!$theParent) :?>
    <?php 
    // Fetch the child pages
    $childPages = get_pages(array(
      'child_of' => $findChildrenOf, 
      'post_type' => 'page', 
      'sort_column' => 'menu_order'
    ));
   ?>


<!-- Start Blog Section -->
<?php if ($childPages): ?>
		<div class="blog-section">
			<div class="container">
				<div class="row">
        <?php
        foreach ($childPages as $childPage) :
          $thumbnail_url = get_the_post_thumbnail($childPage->ID);
          $post = get_post($childPage->ID);
          $post_date = get_the_date('M j, Y', $childPage->ID);
          ?>

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="<?php echo get_permalink($childPage->ID); ?>" class="post-thumbnail">
                <?php echo  $thumbnail_url ?>
                <!-- <img src="images/post-1.jpg" alt="Image" class="img-fluid"></a> -->
							<div class="post-content-entry">
								<h3><a href="<?php echo get_permalink($childPage->ID); ?>">
                <?php echo get_the_title($childPage->ID); ?>
                </a></h3>
								<div class="meta">
									<span>by <a href="<?php echo get_permalink($childPage->ID); ?>"><?php echo get_the_author($childPage->ID) ?></a></span> <span>on <a href="#"><?php echo $post_date;?></a></span>
								</div>
							</div>
						</div>
					</div>
         <?php endforeach; ?>



				</div>
			</div>
		</div>
    <?php endif; ?>
		<!-- End Blog Section -->	

		




<?php endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>