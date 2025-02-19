<?php
/* The template for displaying archive pages */

get_header(); ?>

<div class="archive">
    <?php 

        get_template_part( 
            './template-parts/posts-container/posts-container', 
            null, 
            [ 
                "postType"                  => "post",
                "actionName"                  => "load_posts",
                "initialNumberOfPosts"      => 3,
                "numberOfPostsPerLoadMore"  => 2,
                "filters"                   => true,
                "postTemplateName"          => "post-item",
                "useAjaxForFilters"         => false
                // "taxonomy"                  => "category"
                // "category"                  => ""
            ] 
        );
        
    ?>
</div>

<?php get_footer();