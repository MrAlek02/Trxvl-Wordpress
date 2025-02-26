<?php
/**
 * The template for displaying search results pages
*/

$allsearch = new WP_Query([
    's' => str_replace([' – ', ' - '], ' ', $_GET['s']),
    'post_status' => 'publish',
    'paged' => get_query_var('paged'),
]);

get_header(); 

if ( $allsearch -> have_posts() ) : 

    get_template_part( 'template-parts/search/search-results' );

    ?>

<div class="search__pagination">

    <?= paginate_links(array(
                'total' => $allsearch->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'mid_size'  => 1,
                'prev_text' => __(  '<svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.55219 0.067975C8.45654 0.0174875 8.34914 -0.00561242 8.24152 0.00115294C8.13391 0.00791829 8.03014 0.0442943 7.94136 0.106377L0.254148 5.50666C0.175598 5.56188 0.111407 5.6356 0.0670715 5.7215C0.0227352 5.8074 -0.000423852 5.90292 -0.000423861 5.99989C-0.000423869 6.09685 0.0227351 6.19238 0.0670715 6.27828C0.111407 6.36417 0.175598 6.43789 0.254148 6.49311L7.94135 11.8934C8.03007 11.9557 8.13388 11.9922 8.24156 11.9989C8.34924 12.0056 8.45667 11.9823 8.55223 11.9315C8.64779 11.8807 8.72784 11.8043 8.7837 11.7107C8.83956 11.617 8.8691 11.5096 8.86914 11.4002L8.86914 0.599603C8.86916 0.490075 8.83963 0.382631 8.78376 0.288918C8.72789 0.195204 8.64781 0.118796 8.55219 0.067975Z" fill="#A2CD44"/></svg>', '' ),
                'next_text' => __( '<svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.18609 11.932C1.28175 11.9825 1.38915 12.0056 1.49676 11.9988C1.60438 11.9921 1.70814 11.9557 1.79693 11.8936L9.48413 6.49334C9.56268 6.43812 9.62687 6.3644 9.67121 6.2785C9.71555 6.1926 9.73871 6.09708 9.73871 6.00011C9.73871 5.90315 9.71555 5.80762 9.67121 5.72172C9.62687 5.63583 9.56268 5.56211 9.48413 5.50689L1.79693 0.106603C1.70821 0.0443156 1.6044 0.00784106 1.49672 0.00112912C1.38904 -0.00558283 1.28161 0.0177236 1.18605 0.0685248C1.09049 0.119326 1.01045 0.195686 0.954585 0.289337C0.898725 0.382988 0.869177 0.490361 0.869141 0.599829L0.869141 11.4004C0.869123 11.5099 0.898649 11.6174 0.95452 11.7111C1.01039 11.8048 1.09047 11.8812 1.18609 11.932Z" fill="#A2CD44"/></svg>', '' ),
                )); 
            ?>

</div>

<?php

else :

    get_template_part( 'template-parts/search/no-search-results' );

endif;

get_footer();