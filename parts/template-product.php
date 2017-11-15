<div class="card">
    <div class="card-item a-center">
        <a href="<?php the_permalink(); ?>">
            <figure style="background-image: url('<?php the_post_thumbnail_url(); ?>')" class="bg-img">
                <img class="hidden" src="<?php the_post_thumbnail_url(); ?>" alt="">
            </figure>
        </a>
        <div class="card-content template-product woocommerce">
            <?php $product = new WC_Product(get_the_ID()); ?>
            <h2><?php echo get_the_title(); ?></h2>
            <?php if($product->stock_status !== 'outofstock') { ?>
                <div class="price mg-bt-20">
                    <?php if($product->regular_price) { ?>
                        <span class="card-price-normal">R$<?php echo str_replace('.', ',', $product->regular_price) ?></span>
                    <?php } ?>
                    <span class="card-price">R$<?php echo str_replace('.', ',', $product->sale_price) ?></span>
                </div>
            <?php } ?>
            <?php if($product->stock_status !== 'outofstock') { ?>
                <a rel="nofollow" href="<?php echo home_url('/loja') ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" class="btn btn-theme btn-radius button product_type_simple add_to_cart_button ajax_add_to_cart">Comprar</a>
            <?php } ?>
        </div>
    </div>
</div>