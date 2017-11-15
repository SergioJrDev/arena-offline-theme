<?php get_header(); ?>
	<div class="pad-space" style="margin-bottom: 20px;">
		<div class="container">
			<ul class="breadcrumb">
				<li><p>Você está em: </p></li>
				<li><a href="<?php echo home_url(); ?>">Início</a></li>
				<li><a href="<?php echo home_url('/jogos-a-venda') ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> Jogos a venda</a></li>
				<li><a style="color: #333;" href="<?php the_permalink(); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php the_title(); ?></a></li>
			</ul>
		</div>
	</div>
		<section class="archive banner single-content space-defaul">
			<div class="container">
				<div class="column event">
					<div class="sm-8-12">
						<h2 class="section-title">Categoria: <?php echo get_queried_object()->name ?></h2>	
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
