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
		<div class="space-default no-pad-top"> 
			<div class="container">
				<div class="column">
					<div class="md-8-12 single game-list">
                        <div class=" title-paginate">
                            <div>
                                <h2 class="roboto single_title size-xg" style="padding-bottom: 20px;"><?php echo get_the_title(); ?></h2>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php the_content(); ?>
                                <?php endwhile; ?>
                            </div>
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
                        <div class="grid">
                        <?php
                            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                            $args = array(
                                'posts_per_page'=> $_GET['itens'] !== null ? $_GET['itens'] : 10,
                                'paged' => $paged,
                                'post_type' => 'product',
                                'order' => 'ASC',
                                'orderby' => 'title',
                                'meta_query' => array(
                                    array(
                                        'key' => '_stock_status',
                                        'value' => 'outofstock',
                                        'compare' => 'LIKE'
                                    )
                                )
                            );
                            $query = new WP_Query($args);
                            while($query->have_posts()) { $query->the_post(); ?>
                                <div class="game-item">
                                    <div class="click-game flex-default">
                                        <h2><?php the_title(); ?></h2>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                    <div class="game-content" style="display: none; margin-bottom: 30px; margin-top: 10px;">
                                        <?php if(has_post_thumbnail()) { ?>
                                            <figure style="background-size: contain; background-image: url('<?php the_post_thumbnail_url(); ?>')" class="bg-img">
                                                <img class="hidden" src="<?php the_post_thumbnail_url(); ?>" alt="">
                                            </figure>
                                        <?php } ?>
                                        <?php if(get_field('categoria_de_locacao')) { ?>
                                            <div><strong>Valor da locação:</strong>
                                            <p><?php echo get_field('categoria_de_locacao'); ?> por 1 semana</p></div>
                                        <?php } ?>
                                        <div><strong>Detalhes:</strong></div>
                                        <?php echo get_the_excerpt() ?></br>
                                        <div><strong>Descrição:</strong></div>
                                        <?php echo get_the_content(); ?>
                                    </div>
                                    <div class="clearfix"></div>
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
		</div>
<?php get_footer(); ?>
