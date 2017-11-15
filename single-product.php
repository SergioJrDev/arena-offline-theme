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
		<div class="space-default no-pad-top single"> 
			<div class="container">
				<div class="column">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php $product = new WC_Product(get_the_ID()); ?>
                    <div class="sm-8-12">
                        <div class="column mg-bottom">
                            <div class="sm-6-12">
                                <figure style="background-image: url('<?php the_post_thumbnail_url(); ?>')" class="bg-img">
                                    <img class="hidden" src="<?php the_post_thumbnail_url(); ?>" alt="">
                                </figure>
                            </div>
                            <div class="sm-6-12">
                                <div class="card-content">
                                    <h2 class="uppercase mg-bt-20"><?php the_title(); ?></h2>

                                    <?php if($product->stock_status !== 'outofstock') { ?>
                                        <div class="price mg-bt-20">
                                            <?php if($product->regular_price) { ?>
                                                <span class="card-price-normal">R$<?php echo str_replace('.', ',', $product->regular_price) ?></span><br/>
                                            <?php } ?>
                                            <span class="card-price">R$<?php echo str_replace('.', ',', $product->sale_price) ?></span>
                                        </div>
                                    <?php } ?>

                                    <div class="mg-bt-20">
                                        <?php echo the_excerpt(); ?>
                                    </div>
                                    
                                    <?php if($product->stock_status !== 'outofstock') { ?>
                                        <strong style="margin-bottom: 20px; display: block;">Frete grátis retirando na nossa loja!</strong>
                                        <a rel="nofollow" href="<?php echo home_url('/loja') ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" class="btn btn-theme btn-radius button product_type_simple add_to_cart_button ajax_add_to_cart">Adicionar ao carrinho</a>
                                    <?php } ?>
                                    
                                    <?php if(get_the_ID() == 'X') {
                                        echo '<p>R$5 por pessoa, sem limite de tempo</p>';
                                    }; ?>
                                </div>
                            </div>
                        </div>
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
					<div class="sm-4-12 sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>
