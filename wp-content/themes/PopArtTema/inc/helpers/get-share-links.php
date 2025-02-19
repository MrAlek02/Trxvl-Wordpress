<?php

function fb_share_link( $classes = '' ) { ?>
    <a class="<?php echo esc_attr( $classes ); ?>" 
       href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>" 
       target="_blank">
       <?php svg('facebook'); ?>
    </a>
<?php }

function twitter_share_link( $classes = '' ) { ?>
    <a class="<?php echo esc_attr( $classes ); ?>" 
       href="https://twitter.com/intent/tweet?url=<?php echo esc_url( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>" 
       target="_blank">
       <?php svg('twitter'); ?>
    </a>
<?php }

function pinterest_share_link( $classes = '' ) { ?>
    <a class="<?php echo esc_attr( $classes ); ?>" 
       href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>" 
       target="_blank">
       <?php svg('pinterest'); ?>
    </a>
<?php }

function linkedin_share_link( $classes = '' ) { ?>
    <a class="<?php echo esc_attr( $classes ); ?>" 
       href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>"
       target="_blank">
       <?php svg('linkedin'); ?>
    </a>
<?php }
