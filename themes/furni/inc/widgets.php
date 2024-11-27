<?php

add_action( 'widgets_init', 'furni_sidebars' );
function furni_sidebars(){

    register_sidebar(
        array(
            'name'  => esc_html__( 'Blog Sidebar Testimonials', 'furni' ),
            'id'    => 'sidebar-blog',
            'description'   => esc_html__( 'This is the Blog Sidebar. You can add your widgets here.', 'furni' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title d-none">',
            'after_title'   => '</h4>'
        )
    );

    // register_sidebar(
    //     array(
    //         'name'  => esc_html__( 'Blog Sidebar', 'furni' ),
    //         'id'    => 'sidebar-blog',
    //         'description'   => esc_html__( 'This is the Blog Sidebar. You can add your widgets here.', 'furni' ),
    //         'before_widget' => '<div class="widget-wrapper">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="widget-title">',
    //         'after_title'   => '</h4>'
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'name'  => esc_html__( 'Service 1', 'furni' ),
    //         'id'    => 'services-1',
    //         'description'   => esc_html__( 'First Service Area', 'furni' ),
    //         'before_widget' => '<div class="widget-wrapper">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="widget-title">',
    //         'after_title'   => '</h4>'
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'name'  => esc_html__( 'Service 2', 'furni' ),
    //         'id'    => 'services-2',
    //         'description'   => esc_html__( 'Second Service Area', 'furni' ),
    //         'before_widget' => '<div class="widget-wrapper">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="widget-title">',
    //         'after_title'   => '</h4>'
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'name'  => esc_html__( 'Service 3', 'furni' ),
    //         'id'    => 'services-3',
    //         'description'   => esc_html__( 'Third Service Area', 'furni' ),
    //         'before_widget' => '<div class="widget-wrapper">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="widget-title">',
    //         'after_title'   => '</h4>'
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'name'  => esc_html__( 'Service 4', 'furni' ),
    //         'id'    => 'services-4',
    //         'description'   => esc_html__( 'Fourd Service Area', 'furni' ),
    //         'before_widget' => '<div class="widget-wrapper">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="widget-title">',
    //         'after_title'   => '</h4>'
    //     )
    // );
}