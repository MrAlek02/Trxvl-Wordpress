<?php
    function get_breadcumbs(){?>
		<nav class="breadcrumbs-wrapper">
			<ol class="breadcrumbs">
				<li class="breadcrumbs__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						aria-label="<?php echo esc_html__("Homepage Link", THEME_NAME);?>" class="breadcrumbs__link">
						<?php echo esc_html__("Home", THEME_NAME);?>
					</a>
				</li>

				<?php if(!empty($parents_in_order)):?>
				<?php foreach($parents_in_order as $parent_id):?>
				<?php 
								$parent_title = get_the_title($parent_id);
								$parent_url = get_the_permalink($parent_id);
							?>
				<li class="breadcrumbs__item">
					/ <a href="<?php echo $parent_url?>" class="breadcrumbs__link"><?php echo $parent_title;?></a>
				</li>
				<?php endforeach;?>
				<?php endif;?>

				<?php if(is_single()):?>
				<?php
							$post_type = $queried_object->post_type;
							$post_object = get_post_type_object($post_type);
							$archive_page_url = get_post_type_archive_link($post_type);
							if($post_type === "post") {
								$posts_page_id = get_option("page_for_posts");
								$archive_page_name = get_the_title($posts_page_id);
							} else {
								$archive_page_name = $post_object->labels->name;
							}
						?>

				<li class="breadcrumbs__item">
					/ <a href="<?php echo $archive_page_url;?>" class="breadcrumbs__link"><?php echo $archive_page_name;?></a>
				</li>
				<?php endif;?>
				<li class="breadcrumbs__item">
					/ <span class="breadcrumbs__current-page"><?php echo $page_title;?></span>
				</li>
			</ol>
		</nav>
<?php }?>