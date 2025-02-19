<?php
/*------------------------------------------------------------------------------------------
    # ADVANCED CUSOTM FIELDS
------------------------------------------------------------------------------------------*/
?>

<?php if( have_rows('flexible_content_field_name') ): ?>
    <?php while ( have_rows('flexible_content_field_name') ) : the_row(); ?>


        <?php if( get_row_layout() == 'layout_one' ): ?>

            <?php the_sub_field('text'); ?>

        <?php elseif( get_row_layout() == 'layout_two' ): ?>

            <?php the_sub_field('text'); ?>

        <?php endif; ?>


    <?php endwhile; ?>
<?php endif; ?>