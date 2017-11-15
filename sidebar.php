<?php
?>
<div class="sidebar woocommerce">
	<div class="sidebar_item">
		<h2 class="sidebar_title trace size-md">Pesquisar</h2>
		<form action="<?php echo home_url(); ?>" method="get" id="search-form" class="form search-form">
			<input placeholder="Digite sua pesquisa" class="input" name="s" id="search-input-id" type="text">
			<button type="submit" id="search-submit" class="search-submit submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
	</div>
	<?php if ( is_active_sidebar( 'home_right_1' ) AND (WC()->cart->get_cart_contents_count() > 0)) : ?>
		<ul id="sidebar">
			<?php dynamic_sidebar( 'home_right_1' ); ?>
		</ul>
	<?php endif; ?>
	<div class="sidebar_item">
		<h2 class="sidebar_title trace size-md">Categorias</h2>
		<?php $terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
		) );
		 ?>
		<ul class="cat-list">
			<?php foreach($terms as $term) {
				echo '<li><a class="size-xs" href="'. esc_url( get_term_link( $term ) ).'">'.$term->name.'</a></li>';
			} ?>
		</ul>
	</div>

	<?php $the_query = new WP_Query( array('page_id'=> 352) ); ?>

	<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

		<div class="sidebar_item">
			<h2 class="sidebar_title trace font-lbre size-md"><?php echo get_the_title() ?></h2>
			<img src="<?php the_post_thumbnail_url(); ?>" alt="" class="mg-bt-10">
			<?php the_content() ?>
		</div>

     <?php endwhile;?>
</div>