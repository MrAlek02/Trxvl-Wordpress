<?php
/* The template for displaying archive pages */

get_header(); ?>

<div class="archive-mtn">
    <?php get_template_part(
        './template-parts/archive/archive',
        null,
        null
    )
    ?>
</div>

<?php get_footer();
