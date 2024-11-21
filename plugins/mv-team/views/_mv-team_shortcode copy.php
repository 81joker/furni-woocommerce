<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h3 class="text-center text-danger">
<?php
$mv_team_title = isset(MV_Team_Settings::$options['mv_team_title']) 
    ? MV_Team_Settings::$options['mv_team_title'] 
    : 'Default Title';
?>
</h3>
<div class="mv-team flexteam <?php echo ( isset( MV_Team_Settings::$options['mv_team_style'] ) ) ? esc_attr( MV_Team_Settings::$options['mv_team_style'] ) : 'style-1'; ?>">  
    <?php 
    
    $args = array(
        'post_type' => 'mv-team',
        'post_status'   => 'publish',
        'post__in'  => $id,
        'orderby' => $orderby
    );

    $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ):
        $counter = 0; 
        while( $my_query->have_posts() ) : $my_query->the_post();
            $button_text = get_post_meta( get_the_ID(), 'mv_team_link_text', true );
            $button_url = get_post_meta( get_the_ID(), 'mv_team_link_url', true );

            // Determine order classes based on the counter
            $order_image = ($counter % 2 === 0) ? 'order-md-1' : 'order-md-2';
            $order_text = ($counter % 2 === 0) ? 'order-md-2' : 'order-md-1';
            ?>      
            <div class="container my-md-5 py-md-5 my-2 py-2">
                <div class="row align-items-center">
                    <div class="col-md-6 <?php echo $order_image; ?>">
                        <?php 
                        if( has_post_thumbnail() ){
                            the_post_thumbnail( 'full', array( 'class' => 'img-fluid w-100 shadow-lg  rounded','style' => 'max-height: 400px; object-fit: cover;'  ) );
                        } else {
                            echo mv_team_get_placeholder_image();
                        }
                        ?>  
                    </div>
                    <div class="col-md-5 ml-auto <?php echo $order_text; ?> mx-md-4 pt-3">
                        <div class="site-section-title mb-3">
                            <h2 class="text-uppercase text-dark font-monospace"><?php the_title(); ?></h2>
                        </div>
                        <p class="lh-base"><?php the_content(); ?></p>
                        <a type="button" class="btn btn-dark text-white" href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
                    </div>
                </div>
            </div>
            <?php
            $counter++; 
        endwhile; 
        wp_reset_postdata();
    endif; 
    ?>
</div>