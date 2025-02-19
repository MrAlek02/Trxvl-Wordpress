<?php
    function disable_gutenberg_on_post_type($use_block_editor, $post) {
        if ($post->post_type === "POST_TYPE_SLUG") { //replace post type slug
            return false;
        }
        return $use_block_editor;
    }
    
  add_filter('use_block_editor_for_post', 'disable_gutenberg_on_post_type', 10, 2);

  function remove_editor_from_post_type() {
    remove_post_type_support( 'POST_TYPE_SLUG', 'editor' ); //replace post type slug
  }
  
  add_action('init', 'remove_editor_from_post_type');
?>