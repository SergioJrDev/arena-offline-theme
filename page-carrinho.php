<?php get_header(); ?>
<div class="pad-space" style="margin-bottom: 20px;">
	<div class="container">
		<ul class="breadcrumb">
			<li><p>Você está em: </p></li>
			<li><a href="<?php echo home_url(); ?>">Início</a></li>
			<li><a style="color: #333;" href="<?php the_permalink(); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php the_title(); ?></a></li>
		</ul>
	</div>
</div>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="space-default no-pad-top"> 
			<div class="container">
				<div class="column">
					<div class="md-12-12 single">
						<h2 class="roboto single_title size-xg"><?php the_title(); ?></h2>						
						<div class="single-content-p">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>
