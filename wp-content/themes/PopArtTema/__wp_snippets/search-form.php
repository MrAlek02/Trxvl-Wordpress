<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
</form>