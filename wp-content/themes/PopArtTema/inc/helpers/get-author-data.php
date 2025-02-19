<?php

function get_author_data() {

    $authorId = get_queried_object() -> post_author;
    $authorFirstName = get_the_author_meta( 'first_name', $authorId );
    $authorLastName = get_the_author_meta( 'last_name', $authorId );

    $authorData = [];
    $authorData[ 'fullName' ] = $authorFirstName . ' ' . $authorLastName;
    $authorData[ 'description' ] = get_the_author_meta( 'description', $authorId );
    $authorData[ 'url' ] = get_author_posts_url( $authorId );
    $authorData[ 'avatarUrl' ] = get_avatar_url( $authorId );

    return $authorData;

}

function get_author_image( $authorData, $classes = '' ) { ?>

    <img class="<?php echo esc_attr( $classes ); ?>" src="<?php echo esc_url( $authorData[ 'avatarUrl' ] ); ?>" alt="Avatar of <?php echo esc_attr( $authorData[ 'fullName' ] ); ?>">

<?php }
