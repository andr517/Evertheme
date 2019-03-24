<?php
add_theme_support( 'post-thumbnails' );

function my_theme_enqueue_style() {

		wp_enqueue_style(
			'bulma',
				get_stylesheet_directory_uri() . '/css/bulma.css'
		);
		wp_enqueue_script(
			'jquery'
		);
		wp_enqueue_style(
			'stylesheet',
				get_stylesheet_uri()
		);
		wp_enqueue_style(
			'andre',
				get_stylesheet_directory_uri() . '/css/andre.css'
		);
		wp_enqueue_style(
			'johan',
				get_stylesheet_directory_uri() . '/css/johan.css'
		);
		wp_enqueue_style(
			'jonathan',
				get_stylesheet_directory_uri() . '/css/jonathan.css'
		);
		wp_enqueue_style(
			'victor',
				get_stylesheet_directory_uri() . '/css/victor.css'
		);
		wp_enqueue_style(
			'font-awesome',
				get_stylesheet_directory_uri() . '/css/font-awesome.css'
		);
		wp_enqueue_style(
			'owl',
				get_stylesheet_directory_uri() . '/css/owl.carousel.min.css'
		);
		wp_enqueue_style(
			'owl',
				get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css'
		);
		wp_enqueue_script(
			'script',
				get_stylesheet_directory_uri() . '/js/script.js', array ( 'jquery' ), false, true
		);
		wp_enqueue_script(
			'menu',
				get_stylesheet_directory_uri() . '/js/menu.js', array ( 'jquery' ), false, true
		);
		wp_enqueue_script(
			'owlscript',
				get_stylesheet_directory_uri() . '/js/owl.carousel.js', array ( 'jquery' )
		);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_style' );

///////////////////////////
// Andres funktioner börjar
//////////////////////////

// Sätter värden för woocommerce bilder columner och rader
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 450,
		'single_image_width'    => 700,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Gör det möjligt att ladda upp svg filer till wordpress
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// En funktion som gör det möjligt editera serchforms, placeholder text med mera.
function html5_search_form( $form ) {
     $form = '<section class="search"><form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
     <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search Everzone" />
     <br><input type="submit" id="searchsubmit" class="button" value="'. esc_attr__('Search', 'domain') .'" />
     </form></section>';
     return $form;
}

 add_filter( 'get_search_form', 'html5_search_form' );

// Lägger till footer logga och searchbar widget areas.
 function everzone_widgets_init() {

     register_sidebar( array(
         'name'          => __( 'Footer Left', 'everzone' ),
         'id'            => 'footer-1',
         'description' => 'Appears in the footer area',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
     ) );

     register_sidebar( array(
         'name'          => __( 'Footer Middle', 'everzone' ),
         'id'            => 'footer-2',
         'description' 	=> 'Appears in the footer area',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
     ) );

     register_sidebar( array(
         'name'          => __( 'Footer Right', 'everzone' ),
         'id'            => 'footer-3',
         'description' 	=> 'Appears in the footer area',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
     ) );

 		register_sidebar( array(
         'name'          => __( 'Logo', 'everzone' ),
         'id'            => 'logo-menu',
         'description'	 	=> 'Appears in the header area',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
     ) );

 		register_sidebar( array(
         'name'          => __( 'Logo 2', 'everzone' ),
         'id'            => 'logo-menu2',
         'description'	 	=> 'Appears in the header area',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
     ) );

 		register_sidebar( array(
 				'name'          => __( 'Search Bar', 'everzone' ),
 				'id'            => 'search-menu',
 				'description'	 	=> 'Appears in the header area',
 				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
 				'after_widget'  => '</aside>',
 		) );

 		register_sidebar( array(
 				'name'          => __( 'shop sidebar', 'everzone' ),
 				'id'            => 'shop-bar',
 				'description'	 	=> 'Appears in the left area',
 				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
 				'after_widget'  => '</aside>',
 		) );

 		register_sidebar( array(
 				'name'          => __( 'shop menu', 'everzone' ),
 				'id'            => 'shop-menu',
 				'description'	 	=> 'Appears in the left area',
 				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
 				'after_widget'  => '</aside>',
 		) );
 	}

/////////////////////////////
// Andres funktioner slut.
/////////////////////////////

///////////////////////////
// Jonathans funktion börjar - Ökar antalet tecken i the_excerpt() från 55 till 85.
//////////////////////////
function excerpt_length( $length ) {
    return 85;
}
add_filter( 'excerpt_length', 'excerpt_length', 999 );


// Lägger till en länk för att läsa mer av inlägget i excerpt istället för [...].
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '<a style="text-transform: uppercase; font-size: 11px; color: grey;" href="'. get_permalink($post->ID) . '">Read more</a>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'excerpt_more_link', 21 );

// Lägger till en ny optionsmeny; "Theme Options" med tillhörande submenyer som sedan har fält som man kan lägga till med ACF.
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Settings',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-options',
	));
}

// Skapar en ny posttyp "Stores" för alla butiker på Everzone. Har stöd för titel, redigerare och thumbnail samt använder en kundvagnsikon genom menu_icon. Menu_position => 4 för att den ska ligga direkt under vanlig "Posts".
function create_post_type() {
  register_post_type( 'stores',
    array(
      'labels' => array(
        'name' => __( 'Stores' ),
        'singular_name' => __( 'Store' ),
				'add_new' => __('New Store', 'Store')
      ),
      'public' => true,
      'has_archive' => true,
			'menu_icon'	=> 'dashicons-cart',
			'menu_position' => 4,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

// Funktioner som gör så att jag kan ändra utseende samt bilder och länkar på login-sidan (wp-admin). Första funktionen gör så att en ny CSS läses in för ju loginsidan genom login_head. Andra funktionen ändrar länken på logotypen från Wordpress.org till bloggens url. Tredje funktionen ändrar titelattributet till "Everzone" och fjärde funktionen ändrar logotypens source till en egenvald. Loginsidan läser CSS ifrån filen "custom-login.css".
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Everzone';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/everzone-logo-vit.svg);
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Tar bort Wordpress-ikonen från adminbaren i adminpanelen.
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

// Skapar en "populära inlägg" som kollar hur många visningar ett inlägg har och rangordnar dessa.
function popular_posts($post_id) {
	$count_key = 'popular_posts';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	popular_posts($post_id);
}
add_action('wp_head', 'track_posts');

//Funktion för att visa arkiv i en ul, där både YEAR och MONTH finns med och länkar till rätt år/månad.
function wp_custom_archive($args = '') {
    global $wpdb, $wp_locale;

    $defaults = array(
        'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => true,
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }

    $archive_date_format_over_ride = 0;
    $archive_day_date_format = 'Y/m/d';
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }

    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);

    $output = '<ul class="archives">';

        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }
        if ( $arcresults ) {
            $afterafter = $after;
            foreach ( (array) $arcresults as $arcresult ) {
                $url = get_month_link( $arcresult->year, $arcresult->month );
                $year_url = get_year_link($arcresult->year);
                $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
                $year_text = sprintf('<strong>%d</strong>', $arcresult->year);
                if ( $show_post_count )
                    $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
                $year_output = get_archives_link($year_url, $year_text, $format, $before, $after);
                $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';
                $output .= get_archives_link($url, $text, $format, $before, $after);

                $temp_year = $arcresult->year;
            }
        }

    $output .= '</ul>';

    if ( $echo )
        echo $output;
    else
        return $output;
}
/////////////////////////////
// Jonathans funktioner slut.
/////////////////////////////

///////////////////////////
// Johans funktion börjar;
//////////////////////////

	// Skapar en custom post type för att lägga till olika event.
	function create_event_post_type() {
	  register_post_type( 'event',
	    array(
	      'labels' => array(
	        'name' => __( 'Events' ),
	        'singular_name' => __( 'Event' ),
					'add_new' => __('New Event', 'Event')   // ändrar texten 'add new' till 'New Event'
	      ),
	      'public' => true,
	      'has_archive' => true,
				'menu_icon'	=> 'dashicons-star-filled',		// ändrar ikonen till en stjärna
				'menu_position' => 5,                    // positionerar 'event' under 'store'
				'supports' => array( 'title', 'editor', 'thumbnail' ), // fixar stöd för titel, redigerare och thumbnail
	    )
	  );
	}
	add_action( 'init', 'create_event_post_type' );

///////////////////////////
// Johans funktion slut;
//////////////////////////

add_action( 'widgets_init', 'everzone_widgets_init' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu1' => __( 'Header Menu 1' ),
      'header-menu2' => __( 'Header Menu 2' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>
