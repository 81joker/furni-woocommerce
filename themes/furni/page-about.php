<?php
/**
 * Template Name: About us
 */
?>
<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>
<?php
    get_template_part('parts/content', 'page');
    // if (comments_open() || get_comments_number()) {
    //     comments_template();
    // }
endwhile;
?>

<?php /* echo do_shortcode("[mv_team/]");  */?>

<div class="services-item">
    <?php
    if (is_active_sidebar('sidebar-blog')) {
        dynamic_sidebar('sidebar-blog');
    }
    ?>
</div>




<?php get_footer(); ?>