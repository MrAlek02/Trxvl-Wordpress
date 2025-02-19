<?php
/**
 * The template for displaying all single posts
 * Template Name: Post
 * Template Post Type: post
*/

get_header(); ?>

<div class="single">

    <?php 

        while ( have_posts() ) : the_post();

            get_template_part( './template-parts/post-content/post-content' );
            
        endwhile; 

    ?>

</div>

<?php get_footer();