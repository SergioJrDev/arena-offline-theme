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
		<div class="space-default no-pad-top"> 
			<div class="container">
				<div class="column">
					<div class="md-8-12 single game-list">
                        <div class=" title-paginate">
                            <h2 class="roboto single_title size-xg" style="padding-bottom: 20px;"><?php echo get_the_title(); ?></h2>
                            <form method="GET">
                                <select name="itens" class="select_paginate">
                                    <option value="">Itens por página</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>    
                            </form>
                        </div>
                        <div class="column">
                            <?php
                                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page'=> $_GET['itens'] !== null ? $_GET['itens'] : 12,
                                    'paged' => $paged,
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
                                            'terms' => array('acessorios'),
                                            'field' => 'slug',
                                            'operator' => 'NOT IN',
                                        ),
                                    )
                                );

                                $query = new WP_Query($args);
                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="sm-4-12">
                                    <?php get_template_part( 'parts/template', 'product' ) ?>
                                </div>
                            <?php endwhile;
                                                 
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
		</div>
<?php get_footer(); ?>
