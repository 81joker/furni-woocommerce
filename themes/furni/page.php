<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Furni
 */

get_header(); ?>
<div class="content-area">
	<main>
		<div class="container">
			<div class="row">
				<?php  
					// Start the loop.
					while( have_posts() ): the_post();
						get_template_part( 'parts/content', 'page' );						
						
					// End of the loop.
					endwhile;
				?>
			</div>
		</div>										
	</main>
</div>
<?php get_footer(); ?>