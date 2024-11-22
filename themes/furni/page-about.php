<?php

/**
 * Template Name: About us
 */
?>
<?php get_header(); ?>

<?php echo do_shortcode("[mv_team/]"); ?>

<div class="services-item">

    <?php
    if (is_active_sidebar('sidebar-blog')) {
        dynamic_sidebar('sidebar-blog');
    }
    ?>
</div>




<?php get_footer(); ?>