<?php get_header(); ?>
<!-- 	<section class="pad-space single-top single-banner">
	</section> -->
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="space-default"> 
			<div class="container">
				<div class="column">
					<div class="md-8-12 single">
						<h2 class="roboto single_title size-xg"><?php the_title(); ?></h2>
						<?php if(!has_post_thumbnail()) { ?>
							<figure style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="">
							</figure>
						<?php } ?>
						
						<p class="post_date size-xs" style="display: inline-block; margin-bottom: 0; margin-right: 0px;"> 
							<ul class="cat-list-single">
								<?php $cats = get_the_category();
									foreach($cats as $cat) {
										echo '<li class="size-xs">'.$cat->name.'</li>';
									}
								?>
							</ul>
						</p>
						<div class="single-content-p">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="sm-4-12 sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>
