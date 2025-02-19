<?php
/*------------------------------------------------------------------------------------------
    # ADVANCED CUSOTM FIELDS
------------------------------------------------------------------------------------------*/
?>

<?php if( have_rows('repeater') ): ?>
    <?php while ( have_rows('repeater') ) : the_row(); ?>

        <?php the_sub_field('text'); ?>

    <?php endwhile; ?>
<?php endif; ?>
