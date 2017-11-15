<?php 


// Add Thumbnails
add_theme_support('post-thumbnails');

add_action('wp_head', 'registerJquery');

function registerJquery() {
	$jquery = array(
		'depends' => array(),
		'version' => '1.0',
		'in_footer' => true,
	);
if(	!file_exists(dirname( __FILE__ ).'/plugins/jquery.js')) {
		$jquery['dir'] = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js";
		$jquery['version'] = '3.1.0';
	} else {
		$jquery['dir'] = get_template_directory_uri().'/js/script.js';
	}

	echo wp_enqueue_script('jQuery', $jquery['dir'], $jquery['depends'],  $jquery['version'],$jquery['in_footer']);		
}

// Add scripts
add_action('wp_enqueue_scripts', 'loadScripts');
function loadScripts() {
$scripts = [
	'Script' => [
		'dir' =>  get_template_directory_uri().'/dist/js/bundle.js',
		'depends' => array('jQuery'),
		'version' => '1.0',
		'in_footer' => true,
 	],
	'Lightbox' => [
		'dir' =>  'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js',
		'depends' => array('jQuery'),
		'version' => '1.0',
		'in_footer' => true,
	 ],
	 'owlCarousel' => [
		'dir' =>  get_template_directory_uri().'/plugins/owlcarousel/owl.carousel.min.js',
		'depends' => array('jQuery'),
		'version' => '1.0',
		'in_footer' => true,
 	],
];

$styles = [
	'Style' => [
		'dir' => get_stylesheet_uri(),
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'Styles' => [
		'dir' => get_template_directory_uri().'/dist/css/style.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'OwlCarouselCss' => [
		'dir' => get_template_directory_uri().'/plugins/owlcarousel/assets/owl.carousel.min.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'OwlCarouselTheme' => [
		'dir' => get_template_directory_uri().'/plugins/owlcarousel/assets/owl.theme.default.min.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'hamburger' => [
		'dir' => get_template_directory_uri().'/plugins/hamburger.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'lightbox' => [
		'dir' => 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'Font-Awesome' => [
		'dir' => get_template_directory_uri().'/plugins/font-awesome/css/font-awesome.min.css',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	],
	'Google-Fonts' => [
		'dir' => 'https://fonts.googleapis.com/css?family=Quicksand:400,500,700',
		'depends' => '',
		'version' => '1',
		'in_footer' => false,
	]
];

// <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
// <script src="plugins/jQuery/jquery.js"></script>
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
// <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
//  <script src="js/script.js"></script>


	if($scripts) {
		foreach($scripts as $key => $script) {
			echo wp_enqueue_script($key, $script['dir'], $script['depends'],  $script['version'],$script['in_footer']);
		}
	}

	if($styles) {
		foreach($styles as $key => $style) {
			echo wp_enqueue_style($key, $style['dir'], $style['depends'],  $style['version'],$style['in_footer']);
		}
	}
};

add_action('wp_head', 'configHead');
function configHead() {
	$configs = array(
		'charset' => "<meta charset='UTF-8'>",
		'viewport' => "<meta name='viewport' content='width=device-width'>",
		'color_theme' => "<meta name='theme-color' content='#42af96'><meta name='msapplication-navbutton-color' content='#42af96'><meta name='apple-mobile-web-app-status-bar-style' content='#42af96'>"
	);

	foreach($configs as $config) {
		echo $config . "\n";
	}
}


// Add Menu
add_action( 'after_setup_theme', 'registerMenu' );
function registerMenu() {
  register_nav_menu( 'primary', __( 'Menu principal', 'theme-slug' ) );
};

// Post Type
require dirname( __FILE__ ).'/includes/post_type.php';

// SEO
require dirname( __FILE__ ).'/includes/seo_function.php';

// Length dos posts
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Register our sidebars and widgetized areas.
 *
 */
 function arphabet_widgets_init() {
	
	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
function wcqi_enqueue_polyfill() {
    wp_enqueue_script( 'wcqi-number-polyfill' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'init', 'add_product_cat_to_custom_post_type' );
function add_product_cat_to_custom_post_type() {
	register_taxonomy_for_object_type( 'product_cat', 'show_in_nav_menus' );
}

?>