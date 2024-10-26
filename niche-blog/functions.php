<?php
/**
 * Niche Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package niche_blog
 */

if ( ! function_exists( 'niche_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function niche_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Niche Blog, use a find and replace
		 * to change 'niche-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'niche-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_menu' 		=> esc_html__( 'Primary Menu', 'niche-blog' ),
		) );

		register_nav_menus( array(
			'footer_menu' 		=> esc_html__( 'Footer Menu', 'niche-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'niche_blog_custom_background_args', array(
			'default-color' => 'f8f8f8',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( '/assets/css/editor-style.css', niche_blog_get_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'niche-blog' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'niche-blog' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'niche-blog' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'niche-blog' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'niche-blog' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));
		   add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_attr__( 'Vivid cyan blue to vivid purple', 'niche-blog' ),
					'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
					'slug'     => 'vivid-cyan-blue-to-vivid-purple'
				),
				array(
					'name'     => esc_attr__( 'Vivid green cyan to vivid cyan blue', 'niche-blog' ),
					'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
					'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
				),
				array(
					'name'     => esc_attr__( 'Light green cyan to vivid green cyan', 'niche-blog' ),
					'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
					'slug'     => 'light-green-cyan-to-vivid-green-cyan',
				),
				array(
					'name'     => esc_attr__( 'Luminous vivid amber to luminous vivid orange', 'niche-blog' ),
					'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
					'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
				),
				array(
					'name'     => esc_attr__( 'Luminous vivid orange to vivid red', 'niche-blog' ),
					'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
					'slug'     => 'luminous-vivid-orange-to-vivid-red',
				),
			)
		);

		add_theme_support( 'align-wide' );
		add_theme_support( 'appearance-tools' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'niche-blog' ),
		       	'shortName' => esc_html__( 'S', 'niche-blog' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'niche-blog' ),
		       	'shortName' => esc_html__( 'M', 'niche-blog' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'niche-blog' ),
		       	'shortName' => esc_html__( 'L', 'niche-blog' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'niche-blog' ),
		       	'shortName' => esc_html__( 'XL', 'niche-blog' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
		// Add support for responsive embeds
		add_theme_support( "responsive-embeds" );
	}
endif;
add_action( 'after_setup_theme', 'niche_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function niche_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'niche_blog_content_width', 790 );
}
add_action( 'after_setup_theme', 'niche_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function niche_blog_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'niche-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'niche-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) 
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'niche-blog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'niche-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'niche-blog' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'niche-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'niche-blog' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'niche-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'niche_blog_widgets_init' );

/**
* Enqueue theme fonts.
*/
function niche_blog_fonts() {
	$fonts_url = niche_blog_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/webfont-loader.php' );
		wp_enqueue_style( 'niche-blog-fonts', wptt_get_webfont_url( $fonts_url ), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'niche_blog_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'niche_blog_fonts', 1 );

/**
 * Retrieve webfont URL to load fonts locally.
 */
function niche_blog_get_fonts_url() {
	$font_families = array(
		'Nunito:400,400i,600,600i,700,700i,800,800i,900,900i',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'niche_blog_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

/**
 * Enqueue scripts and styles.
 */
function niche_blog_scripts() {

	wp_enqueue_style( 'niche-blog-main-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'niche-blog-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/fontawesome.min.css' );
	
	wp_enqueue_style( 'niche-blog-font-awesome-style', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ) );

	wp_enqueue_style( 'niche-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'niche-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20230201', true );

	wp_enqueue_script( 'niche-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0', true );
	
	$niche_blog_l10n = array(
		'quote'          => niche_blog_get_svg( array( 'icon' => 'angle-down' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'niche-blog' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'niche-blog' ),
		'icon'           => niche_blog_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'niche-blog-navigation', 'niche_blog_l10n', $niche_blog_l10n );

	wp_enqueue_script( 'niche-blog-custom-script', get_template_directory_uri() . '/assets/js/niche-blog-custom.js', array('jquery'), '20230101', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'niche_blog_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Niche Blog 1.0.0
 */
function niche_blog_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'niche-blog-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'niche-blog-fonts', niche_blog_get_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'niche_blog_block_editor_styles' );

// Block Style
function mytheme_register_block_styles() {
    if ( function_exists( 'register_block_style' ) ) {
        // Register a style for the paragraph block
        register_block_style(
            'core/paragraph', // The block to target
            array(
                'name'  => 'fancy-paragraph', // Unique name for the style
                'label' => __( 'Fancy Paragraph', 'niche-blog' ), // Display name in the editor
                'inline_style' => '.wp-block-paragraph.is-style-fancy-paragraph { font-style: italic; color: #333; }' // Inline CSS
            )
        );
    }
}
add_action( 'init', 'mytheme_register_block_styles' );

// Block Style Pattern
function mytheme_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        register_block_pattern(
            'mytheme/hero-section', // Unique name for the pattern
            array(
                'title'       => __( 'Hero Section', 'niche-blog' ),
                'description' => _x( 'A hero section with heading, text, and button.', 'Block pattern description', 'niche-blog' ),
                'content'     => '<!-- wp:group {"align":"full","backgroundColor":"primary"} -->
                <div class="wp-block-group alignfull has-primary-background-color has-background">
                    <h2>Welcome to My Theme</h2>
                    <p>Start your journey with a custom theme.</p>
                    <!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link">Get Started</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:group -->',
                'categories'  => array( 'featured', 'hero' ),
                'keywords'    => array( 'hero', 'intro', 'welcome' ),
            )
        );
    }
}
add_action( 'init', 'mytheme_register_block_patterns' );

/**
 * Removing category text from category page.
 */
function niche_blog_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'niche_blog_category_title' );

/**
 * Function to display the dashboard banner notification
 */

function nicheblog_dashboard_notification() {
    if ( ! get_user_meta( get_current_user_id(), 'dismissed_dashboard_notification', true ) || get_user_meta( get_current_user_id(), 'dismissed_dashboard_notification', true ) < strtotime( '-30 days' ) ) {
        ?>
        <div class="notice notice-info is-dismissible">
            <h2><strong>Looking to turbocharge your website's performance?</strong></h2>
			<a style="font-size:16px" >Let us help you speed things up! 🚀 Whether it's optimizing your site, fine-tuning your hosting, or implementing caching strategies, we've got the expertise to boost your site's speed and efficiency. 
			<br>Say goodbye to slow loading times and hello to a faster, smoother user experience. Get in touch today for expert assistance! </a>
			<br>
				<a style="background-color: #fcc803; border-radius: 5px; color: #000; margin: 15px; padding: 15px 34px; font-weight: 700; text-decoration: none; text-transform: uppercase;font-size:16px; display: -webkit-inline-box;" href="https://fahimm.com/contact/" type="button" target="_blank">Get a Quote</a>
        </div>
        <style>
            .notice-info .notice-dismiss {
                display: block;
            }
        </style>
        <script>
            jQuery(document).on('click', '.notice-dismiss', function () {
                jQuery.ajax({
                    url: ajaxurl,
                    data: {
                        action: 'dismiss_dashboard_notification'
                    }
                });
            });
        </script>
        <?php
    }
}
add_action( 'admin_notices', 'nicheblog_dashboard_notification' );

// AJAX action to dismiss the notification
function dismiss_dashboard_notification() {
    update_user_meta( get_current_user_id(), 'dismissed_dashboard_notification', time() );
    die();
}
add_action( 'wp_ajax_dismiss_dashboard_notification', 'dismiss_dashboard_notification' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * SVG icons functions and filters.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';