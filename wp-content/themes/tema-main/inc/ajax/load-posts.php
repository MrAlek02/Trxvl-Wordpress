<?php

function ajax__load_posts() { 

    $postType = $_POST["postType"];
    $page = intval($_POST["page"]);
    $postTemplateName = $_POST["postTemplateName"];
    $category = $_POST["category"];
    $taxonomy = $_POST["taxonomy"];
    $replace = $_POST["replace"];
    $numberOfPosts = $_POST["numberOfPosts"];
    $initialNumberOfPosts = $_POST["initialNumberOfPosts"];

    $args = array(
        'post_type'            => $postType,
        'posts_per_page'       => $numberOfPosts,
        'offset'               => $initialNumberOfPosts + ($page - 2) * $numberOfPosts,
		'post_status'          => 'publish',
			'tax_query' => array( 
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => array($category),
				)
			)
    );

    if(!$category) {
        unset($args['tax_query']);
    }
    
    $query = new WP_Query( $args );
    
    ob_start();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) { 

            $query->the_post(); 
            get_template_part( './template-parts/' . $postTemplateName . '/'  . $postTemplateName );
            
        }
    }

    $posts = ob_get_contents();
    ob_end_clean();

    $data = array(
        "posts"     => $posts,
        "lastPage"  => $query->found_posts <= $initialNumberOfPosts + ($page - 2) * $numberOfPosts + $numberOfPosts
    );

    echo json_encode($data);
    
    exit;
}

add_action('wp_ajax_nopriv_load_posts', 'ajax__load_posts');
add_action('wp_ajax_load_posts', 'ajax__load_posts');