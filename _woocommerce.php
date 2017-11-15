<?php get_header(); ?>
<!-- 	<section class="pad-space single-top single-banner">
	</section> -->
	<?php while ( have_posts() ) : the_post();
        woocommerce_content();
	 endwhile; ?>
<?php get_footer(); ?>
