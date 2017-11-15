<?php get_header(); ?>
<div class="pad-space" style="margin-bottom: 20px;">
<div class="container">
	<ul class="breadcrumb">
		<li><p>Você está em: </p></li>
		<li><a href="<?php echo home_url(); ?>">Início</a></li>
		<li><a style="color: #333;" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Busca</a></li>
	</ul>
</div>
</div>
	<div class="space-default no-pad-top archive-recados centered single-z">
		<div class="container">
			<div class="column">
				<div class="md-8-12">
					<div class=" title-paginate" style="padding-bottom: 20px;">
						<h2 class="roboto single_title size-xg" >Resultado de busca por <?php echo $_GET['s'] ?></h2>
						<!-- <form method="GET">
							<label for="">Itens por página</label>
							<select name="itens" class="select_paginate">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
							</select>    
							<input type="hidden" name="s" value="<?php //$_GET['s'] ?>">
						</form> -->
					</div>
					<div class="search">
						<div class="column">
							<?php 
								$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
								$args = array(
									's' => $_GET['s'],
									'paged' => $paged,
									'post_type' => ['product'],
									// 'posts_per_page' => -1,
									'posts_per_page' => $_GET['itens'] !== null ? $_GET['itens'] : 10,
								);

								$query = new WP_Query( $args );
								if($query->have_posts()) {
									while($query->have_posts()) { $query->the_post(); ?>
									<?php $product = new WC_Product(get_the_ID()); ?>
									<div class="woocommerce">
										<div class="search-item">
											<?php if(has_post_thumbnail()) { ?>
												<a href="<?php if($product->stock_status !== 'outofstock') { the_permalink(); } else { '#'; } ?>">
													<figure style="background-image: url('<?php the_post_thumbnail_url(); ?>')" class="bg-img">
														<img class="hidden" src="<?php the_post_thumbnail_url(); ?>" alt="">
													</figure>
												</a>
											<?php } ?>
												<div class="search-title">
												<a href="<?php if($product->stock_status !== 'outofstock') { the_permalink(); } else { '#'; } ?>">
													<h2><?php the_title(); ?></h2>
												</a>
												<div class="mg-top">
													<?php if($product->stock_status !== 'outofstock') { ?>
														<div class="price mg-bt-20">
															<?php if($product->regular_price) { ?>
																<span class="card-price-normal">R$<?php echo str_replace('.', ',', $product->regular_price) ?></span>
															<?php } ?>
															<span class="card-price">R$<?php echo str_replace('.', ',', $product->sale_price) ?></span>
														</div>
														<a rel="nofollow" href="<?php echo home_url('/loja') ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" class="btn btn-theme btn-radius button product_type_simple add_to_cart_button ajax_add_to_cart">Adicionar ao carrinho</a>
													<?php } else { ?>
														<h3><i class="fa fa-star" aria-hidden="true"></i> Jogo para Locação</h3>
													<?php } ?>
												</div>
											</div>
										</div>
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
								} else {
									echo 'Nenhum resultado encontrado.';
								}
							?>
						</div>
					</div>
					
				</div>
				<div class="md-4-12">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>