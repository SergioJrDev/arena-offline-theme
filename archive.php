<?php get_header(); ?>
<section class="archive banner single-content space-defaul">
	<div class="container">
		<div class="column event">
			<div class="sm-8-12">
				<h2 class="section-title">Todos as publicações sobre <?php echo get_queried_object()->name ?></h2>	
				<div class="column">
					<?php while(have_posts()): the_post(); ?>
					<div class="sm-4-12">
						<?php get_template_part( 'parts/template', 'product' ) ?>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="sm-4-12 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
