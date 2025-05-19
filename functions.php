<?php
$aali_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function aali_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
  	add_theme_support( 'custom-header' ); 
  	add_theme_support( 'custom-background' );
  	$lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('aali', $lang);
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
      'primary' =>  esc_html__( 'Primary Blog Menu: Chosen menu in Blog', 'aali' ),
      'primary_blog_dark' =>  esc_html__( 'Primary Blog Dark Menu: Chosen menu in Blog dark', 'aali' ),
      'primary_dark' =>  esc_html__( 'Primary Dark ', 'aali' ),
      'primary_light' =>  esc_html__( 'Primary Light Navigation Menu: Chosen menu in home pages light ...', 'aali' ),
  	) );
      // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'aali_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function aali_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aali' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800' ), '//fonts.googleapis.com/css2' );
    }
    return $font_url;
}
function aali_fonts_url2() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aali' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700' ), '//fonts.googleapis.com/css2' );
    }
    return $font_url;
}
function aali_fonts_url3() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aali' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' ), '//fonts.googleapis.com/css2' );
    }
    return $font_url;
}
function aali_theme_scripts_styles() {
  	$aali_redux_demo = get_option('redux_demo');
  	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'aali-plugins', get_template_directory_uri().'/css/plugins.css');
    wp_enqueue_style( 'aali-fonts', aali_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'aali-fonts-2', aali_fonts_url2(), array(), '2.0.0' );
    wp_enqueue_style( 'aali-fonts-3', aali_fonts_url3(), array(), '3.0.0' );
    wp_enqueue_style( 'aali-dark', get_template_directory_uri().'/css/dark.css');
    wp_enqueue_style( 'aali-css', get_template_directory_uri().'/css/style.css');
    wp_enqueue_style( 'aali-style', get_stylesheet_uri(), array(), '2020-04-01' );
	if($aali_redux_demo['chosen-color']==1){
    wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
    }
  	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    //Javascript
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('jquery-3.6.0', get_template_directory_uri().'/js/jquery.js',array(),false,true);
    wp_enqueue_script('aali-plugins', get_template_directory_uri().'/js/plugins.js',array(),false,true);
    wp_enqueue_script('aali-init', get_template_directory_uri().'/js/init.js',array(),false,true);
}
add_action( 'wp_enqueue_scripts', 'aali_theme_scripts_styles' );
//Custom Excerpt Function
function aali_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
} 
// Widget Sidebar
function aali_widgets_init() {
  	register_sidebar( array(
      'name'          => esc_html__( 'Primary Sidebar', 'aali' ),
      'id'            => 'sidebar-1',        
  		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'aali' ),        
  		'before_widget' => '<div class="widget %2$s" id="%1$s">',        
  		'after_widget'  => '</div>',        
  		'before_title'  => '<div class="title"><h3><span>',        
  		'after_title'   => '<i class="icon-angle-double-right"></i></span></h3>
            </div>'
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer One Widget', 'aali' ),
      'id'            => 'footer-area-1',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'aali' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Two Widget', 'aali' ),
      'id'            => 'footer-area-2',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'aali' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
}
add_action( 'widgets_init', 'aali_widgets_init' );
//function tag widgets
function aali_tag_cloud_widget($args) {
  	$args['number'] = 0; //adding a 0 will display all tags
  	$args['largest'] = 18; //largest tag
  	$args['smallest'] = 11; //smallest tag
  	$args['unit'] = 'px'; //tag font unit
  	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
  	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
  	return $args;
}
add_filter( 'widget_tag_cloud_args', 'aali_tag_cloud_widget' );
function aali_excerpt() {
  $aali_redux_demo = get_option('redux_demo');
  if(isset($aali_redux_demo['blog_excerpt'])){
    $limit = $aali_redux_demo['blog_excerpt'];
  }else{
    $limit = 50;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function aali_search_form( $form ) {
    $form = '
        <form action="' . esc_url(home_url('/')) . '">
            <input type="text" class="s-input-home" name="s" required value="' . get_search_query() . '" placeholder="'.esc_attr__('Search…', 'aali').'">
            <button class="btn-s-input" type="submit"><i class="icon-search"></i></button>
        </form>
	';
    return $form;
}
add_filter( 'get_search_form', 'aali_search_form' );
function aali_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='100' )!=''){?>
      <li>
        <div class="list_inner">
          <?php echo get_avatar($comment,$size='95');?>
          <div class="short">
            <div class="left">
              <h3><?php printf( get_comment_author_link()) ?></h3>
              <span><?php comment_time(get_option( 'date_format' ));?></span>
            </div>
            <div class="right">
              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
          </div>
          <div class="text">
            <?php comment_text() ?>
          </div>
        </div>
      </li>
  <?php }else{?>
<li>
        <div class="list_inner">
          <div class="short">
            <div class="left">
              <h3><?php printf( get_comment_author_link()) ?></h3>
              <span><?php the_time(get_option( 'date_format' ));?></span>
            </div>
            <div class="right">
              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
          </div>
          <div class="text">
            <?php comment_text() ?>
          </div>
        </div>
      </li>
<?php }?>

<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'aali_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function aali_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'aali' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'aali' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'aali' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'aali' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'aali' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'SVG Support', 'aali' ),
            'slug'      => 'svg-support',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'aali' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'aali' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Aali Common', 'aali' ),
            'slug'                     => 'aali-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/aali-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Aali Elementor', 'aali' ),
            'slug'                     => 'aali-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/aali-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'aali' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'aali' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'aali' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'aali' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'aali' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'aali' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'aali' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'aali' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'aali' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'aali' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'aali' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'aali' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'aali' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'aali' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'aali' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'aali' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'aali' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>