<?php 
/* The template for displaying p404 pages (not found) */ 

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php get_favicons(); ?>
    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?> data-globals="<?= get_js_globals() ?>">

    <?php get_template_part( './template-parts/header/header' ); ?>
    <?php wp_footer(); ?>

</body>

</html>