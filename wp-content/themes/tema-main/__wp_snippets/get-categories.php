<?php 
    $categories = get_categories( 
        array(
            'orderby' => 'name',
            'order'   => 'ASC'
    ));?>
<?php foreach( $categories as $category ) :?>
    <?php if($category->name != 'Uncategorized'):?>
        <li>
            <a href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name;?></a>
        </li>
    <?php endif;?>
<?php endforeach; ?>