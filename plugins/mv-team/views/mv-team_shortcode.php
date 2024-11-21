<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h3 class="text-center text-danger">
    <?php
    $mv_team_title = isset(MV_Team_Settings::$options['mv_team_title'])
        ? MV_Team_Settings::$options['mv_team_title']
        : 'Default Title';
    ?>
</h3>
<div class="mv-team flexteam <?php echo (isset(MV_Team_Settings::$options['mv_team_style'])) ? esc_attr(MV_Team_Settings::$options['mv_team_style']) : 'style-1'; ?>">
    <?php

    $args = array(
        'post_type' => 'mv-team',
        'post_status'   => 'publish',
        'post__in'  => $id,
        'orderby' => $orderby
    );

    ?>
    <!-- Start Team Section -->
    <div class="untree_co-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $my_query = new WP_Query($args);

                if ($my_query->have_posts()):

                    while ($my_query->have_posts()) : $my_query->the_post();
                        $button_text = get_post_meta(get_the_ID(), 'mv_team_link_text', true);
                        $button_url = get_post_meta(get_the_ID(), 'mv_team_link_url', true);
                ?>
                        <!-- Start Column  -->
                        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'img-fluid mb-5 shadow-lg', 'style' => 'max-height: 400px; object-fit: cover;'));
                            } else {
                                echo mv_team_get_placeholder_image();
                            }
                            ?>

                            <h3 class="title-team"><span><?php the_title(); ?></span></h3>
                            <!-- <span class="d-block position mb-4">CEO, Founder, Atty.</span> -->
                            <p><?php the_content(); ?></p>
                            <p class="mb-0"><a href="<?php echo get_permalink() ?>" class="more dark title-team">Learn More <span class="icon-arrow_forward"></span></a></p>
                        </div>
                        <!-- End Column  -->
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
    <!-- End Team Section -->

</div>