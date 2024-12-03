<?php

add_action('rest_api_init', 'furniLikeRoutes');

function furniLikeRoutes() {
  register_rest_route('furni/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('furni/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}

function createLike($data) {
  if (get_current_user_id()) {
  // if (is_user_logged_in()) {
    $professor = sanitize_text_field($data['professorId']);

    $existQuery = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'liked_professor_id',
          'compare' => '=',
          'value' => $professor
        )
      )
    ));

    if ($existQuery->found_posts == 0 AND get_post_type($professor) == 'product') {
     // wp_insert_post( $postarr:array, $wp_error:boolean, $fire_after_hooks:boolean )
     return wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => 'Seond ID Our php Create Post Test',
        'meta_input' =>array(
          // This is name from Advanced Custom Fields
          'liked_professor_id' => $professor
        )
      ));
    } else {
      die("Invalid professor id");
    }
    


  } else {
    die("you should login in");

  }
  
}

function deleteLike($data) {
  $likeId = sanitize_text_field($data['like']);
  if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
    wp_delete_post($likeId, true);
    return 'Congrats, like deleted.';
  } else {
    die("You do not have permission to delete that.");
  }
}