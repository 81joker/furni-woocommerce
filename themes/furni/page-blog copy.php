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


<!-- ST display child in parent -->
<?php
if ($childPages): ?>
  <div class="properties section mt-0">
    <div class="container">
      <div class="row">
        <?php
        foreach ($childPages as $childPage) {
          $thumbnail_url = get_the_post_thumbnail($childPage->ID);
          $post = get_post($childPage->ID);

          if ($thumbnail_url) { ?>

            <div class="col-lg-4 col-md-6">
              <div class="item child-item">
                <a href="<?php echo get_permalink($childPage->ID); ?>" class="child-img">
                  <div class="hover-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon bi bi-plus" viewBox="0 0 16 16">
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                  </div>
                  <div class="taxonomy-term__content">
                  <?php echo apply_filters('the_content', $post->post_content); ?>
                  </div>
                  <div class="taxonomy-term__image">
                    <?php echo $thumbnail_url; ?>
                  </div>
                </a>
                <h4 class="taxonomy-term__title"><a href="<?php echo get_permalink($childPage->ID); ?>"><?php echo get_the_title($childPage->ID); ?></a></h4>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- En display child in parent -->

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