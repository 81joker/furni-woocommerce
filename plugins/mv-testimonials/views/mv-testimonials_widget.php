<div class="testimonial-item">
    <!-- Start Testimonial Slider -->
    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title"><?php esc_html_e( 'Testimonials', 'furni' ) ?></h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">
                            <?php
                            $testimonials = new WP_Query(
                                array(
                                    'post_type' => 'mv-testimonials',
                                    'posts_per_page'    => $number,
                                    'post_status'   => 'publish'
                                )
                            );

                            if ($testimonials->have_posts()):
                                while ($testimonials->have_posts()):
                                    $testimonials->the_post();

                                    $url_meta = get_post_meta(get_the_ID(), 'mv_testimonials_user_url', true);
                                    $occupation_meta = get_post_meta(get_the_ID(), 'mv_testimonials_occupation', true);
                                    $company_meta = get_post_meta(get_the_ID(), 'mv_testimonials_company', true);
                                    // var_dump(the_title());
                            ?>
                                    <div class="item">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 mx-auto">

                                                <div class="testimonial-block text-center">
                                                    <blockquote class="mb-5">
                                                        <p><?php the_content(); ?></p>
                                                          </blockquote>

                                                    <div class="author-info">
                                                        <div class="author-pic">
                                                            <?php
                                                            if (has_post_thumbnail()) {
                                                                the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive img-fluid', 'title' => 'Feature image']);                                                                // $thumbnail_id = get_post_thumbnail_id();
                                                                // echo wp_get_attachment_image($thumbnail_id, 'full', false, array('class' => 'img-fluid'));
                                                            }
                                                            ?>
                                                        </div>
                                                        <h3 class="font-weight-bold"><?php the_title(); ?></h3>
                                                        <span class="position d-block mb-3">
                                                        <?php if( $occupation ): ?>
                <span class="occupation"><?php echo esc_html( $occupation_meta ); ?></span>,
            <?php endif; ?>
            <?php if( $company ): ?>
                <span class="company"><a href="<?php echo esc_attr( $url_meta ) ?>"><?php echo esc_html( $company_meta ); ?></a></span>
            <?php endif; ?> 
                                                        </span>
                                                        <!-- <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END item -->

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Slider -->
</div>

<a href="<?php echo get_post_type_archive_link('mv-testimonials'); ?>"><?php echo esc_html_e('Show More Testimonials', 'mv-testimonials'); ?></a>