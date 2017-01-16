<?php
/*
Template Name: Replay Viewer
*/
get_header(); ?>

<div id="replay-viewer" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      
      <?php the_content(); ?>
      
<?php endwhile;?>


</div>
<div id="footer-container">
</div>
<?php get_footer(); 

