<?php
/**
 * 
 * @package Furni
 */

?>
<article class="col">
	<h1><?php the_title(); ?></h1>
	<div><?php the_content(); ?></div>
	<?php 
    	// If comments are open or we have at least one comment, load up the comment template.
        if( comments_open() || get_comments_number()):
            comments_template();
        endif;
	 ?>
</article>