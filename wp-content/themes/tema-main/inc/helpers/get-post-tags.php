<?php

function get_post_tags( $classes ) {

    $tags = get_the_tags();

    foreach($tags as $tag): ?>

        <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>" class="<?php echo esc_attr( $classes ); ?>"><?php echo esc_html( $tag->name ); ?></a>

    <?php endforeach;

}