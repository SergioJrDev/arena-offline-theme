<?php 
// Seta Meta Tags
add_action('wp_head', 'setMeta');
function setMeta() {
global $post; $postParent = get_post($post->ID);
	?>
	<meta name="description" content="<?php echo is_home() ? bloginfo( 'description' ) : wp_trim_words($postParent->post_content, 50, null); ?>"/>
	<meta name="robots" content="index, follow">
	<link rel="canonical" href="<?php if(is_home()) {
		echo home_url();
		} elseif (is_archive()) {
			echo home_url(get_post_type());
		} else {
			echo get_permalink();
		}; ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if(is_home()) {
		echo bloginfo( 'name' );
		} elseif (is_archive()) {
			echo get_post_type_object(get_post_type())->labels->singular_name;
		} else {
			echo get_the_title();
		}; ?>" />
	<meta property="og:description" content="<?php echo is_home() ? bloginfo( 'description' ) : wp_trim_words($postParent->post_content, 50, null); ?>"/>
	<meta property="og:url" content="<?php if(is_home()) {
		echo home_url();
		} elseif (is_archive()) {
			echo home_url(get_post_type());
		} else {
			echo get_permalink();
		}; ?>" />
	<meta property="og:site_name" content="<?php echo is_home() ? bloginfo( 'name' ) : get_the_title(); ?>" />
	<meta property="article:publisher" content="__" />
	<meta property="article:author" content="__" />
	<meta property="article:tag" content="<?php echo bloginfo( 'name' ); ?>" />
	<meta property="article:published_time" content="<?php echo !is_home() ? get_post_time('Y\-m\-d\TH:i:s') : '' ?>" />
	<meta property="og:image" content="<?php if(is_single()) { 
					echo the_post_thumbnail_url();
				} else  {
					echo '__';
				} ?>" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:description" content="<?php echo is_home() ? bloginfo( 'description' ) : wp_trim_words($postParent->post_content, 50, null); ?>"/>
	<meta name="twitter:title" content="<?php if(is_home()) {
		echo bloginfo( 'name' );
		} elseif (is_archive()) {
			echo get_post_type_object(get_post_type())->labels->singular_name;
		} else {
			echo get_the_title();
		}; ?>" />
	<meta name="twitter:site" content="__" />
	<meta name="twitter:image" content="<?php if(is_single()) {
					echo the_post_thumbnail_url();
				} else  {
					echo '__';
				} ?>" />
	<meta name="twitter:creator" content="__" />
<?php } 