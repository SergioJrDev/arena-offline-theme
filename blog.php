<?php
	// Template Name: Todos os Posts
?>
<?php get_header(); ?>
		<section class="archive banner single-content mg-bottom">
			<div class="container">
				<ul class="breadcrumb">
					<li><p>Você está em: </p></li>
					<li><a href="<?php echo home_url(); ?>">Início</a></li>
					<li><a href="<?php echo home_url('/todos-os-posts'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> Todos os Posts</a></li>
					<li><a style="color: #333" href=""><i class="fa fa-angle-right" aria-hidden="true"></i> <?php the_title() ?></a></li>
				</ul>
			</div>
			<div class="container">
				<div class="grid">
					<div class="sm-8-12">
						<h2 class="section-title trace">Todos as publicações</h2>
						<div class="grid">
							<?php
								$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
								$args = array(
									'posts_per_page'=> 8,
									'paged' => $paged,
								);
								$query = new WP_Query($args);
								while($query->have_posts()) { $query->the_post(); ?>
									<div class="sm-6-12">
										<?php get_template_part( 'parts/posts', 'card' ); ?>
									</div>
								<?php }

								
								$big = 999999999; 

								$argPag = array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $query->max_num_pages
								);

									echo '<div class="pagination a-center">'.paginate_links($argPag).'</div>';

								?>
						
						</div>
					</div>
					<div class="sm-4-12 sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>
