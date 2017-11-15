<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="space-default"> 
			<div class="container max-width-container">
				<div class="column">
					<div class="md-12-12 single">
						<div class="single-content-p">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>
