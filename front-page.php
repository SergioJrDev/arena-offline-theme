<?php get_header(); ?>
<div class="space-default woocommerce"> 
	<div class="container">
		<div class="column">
			<div class="md-8-12 single">
			<div class=" owl-carousel-main owl-carousel owl-theme lider-front">
				<div class=" item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/come.jpg" alt="">
				</div>
				<div class=" item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/come2.jpg" alt="">
				</div>
				<div class=" item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/come3.jpg" alt="">
				</div>
			</div>

				<h2 class="font-libre title-section">Jogos em destaque</h2>
				<div class=" owl-carousel owl-theme slider-front mg-bottom">
				<?php
					$args = array(
						'posts_per_page'=> 4,
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' => '_stock_status',
								'value' => 'instock',
								'compare' => 'LIKE'
							)
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'terms' => ['board-game'],
								'field' => 'slug',
							),
						)
					);
					$query = new WP_Query($args);
					while($query->have_posts()) { $query->the_post(); ?>
						<div class=" item">
							<?php get_template_part( 'parts/template', 'product' ) ?>
						</div>
					<?php } ?>
				</div>


				<h2 class="font-libre title-section">Jogos em promoçao</h2>
				<div class=" owl-carousel owl-theme slider-front">
				<?php
					$args = array(
						'posts_per_page'=> 4,
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' => '_stock_status',
								'value' => 'instock',
								'compare' => 'LIKE'
							)
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'terms' => ['card-games'],
								'field' => 'slug',
							),
						)
					);
					$query = new WP_Query($args);
					while($query->have_posts()) { $query->the_post(); ?>
						<div class=" item">
							<?php get_template_part( 'parts/template', 'product' ) ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="sm-4-12 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>