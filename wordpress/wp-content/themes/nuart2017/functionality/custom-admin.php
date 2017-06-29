<?php


// CUSTOMIZE WORDPRESS ADMIN LOGIN LOGO
function custom_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-black.svg);
            padding-bottom: 0;
            width: 150px;
            height: 53px;
            margin-bottom: 5px;
            background-size: 100%;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');


// ADD LINK TO WORDPRESS ADMIN LOGIN LOGO
function add_logo_url($url) {
    return get_site_url();
}
add_filter('login_headerurl', 'add_logo_url');


// CUSTOMIZE ADMIN BAR
function customize_admin_bar() {
    global $wp_admin_bar;   
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('comments'); 
}
add_action('admin_bar_menu', 'customize_admin_bar', 999);
add_filter('show_admin_bar', '__return_false');


// CUSTOMIZE ADMIN FOOTER
function customize_admin_footer() {
    echo "<?php
    if (is_user_logged_in()) {
    if (current_user_can('edit_theme_options') && !current_user_can('manage_options')) {
    ?>

    <script>
        jQuery.noConflict();
        jQuery(document).ready(function() {
        jQuery('li#menu-appearance.wp-has-submenu li a[href=\"themes.php\"]').remove();
        jQuery('li#menu-appearance.wp-has-submenu a.wp-has-submenu').removeAttr(\"href\");
        jQuery('li#menu-appearance.wp-has-submenu li a[href=\"widgets.php\"]').remove();
        // jQuery('li#menu-appearance.wp-has-submenu li a[href=\"nav-menus.php\"]').remove();
        jQuery('li#menu-appearance.wp-has-submenu li a[href=\"themes.php?page=custom-background\"]').remove();
        });
    </script>
    <?php
    }
  }
?>";
}
add_filter('admin_footer_text', 'customize_admin_footer');


// REMOVE APPEARANCE CUSTOMIZE MENU ITEM
function remove_customize() {
    $customize_url_arr      = array();
    $customize_url_arr[]    = 'customize.php';
    $customize_url          = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
    $customize_url_arr[]    = $customize_url;

    if(current_theme_supports('custom-header') && current_user_can('customize')) {
        $customize_url_arr[] = add_query_arg('autofocus[control]', 'header_image', $customize_url);
        $customize_url_arr[] = 'custom-header';
    }
    
    if(current_theme_supports('custom-background') && current_user_can('customize')) {
        $customize_url_arr[] = add_query_arg('autofocus[control]', 'background_image', $customize_url);
        $customize_url_arr[] = 'custom-background';
    }

    foreach($customize_url_arr as $customize_url) {
        remove_submenu_page('themes.php', $customize_url);
    }
}
add_action('admin_menu', 'remove_customize', 999);


// CLEAN WORDPRESS DASHBOARD
function remove_dashboard_widgets() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
} 
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


// ALLOW SVG UPLOADS IN MEDIA LIBRARY
function allow_svgs($mimes){
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgs');

// ALLOW SVG UPLOADS IN MEDIA LIBRARY -- FIX
function allow_svgs_fix($data, $file, $filename, $mimes) {
    $wp_filetype        = wp_check_filetype($filename, $mimes);
    $ext                = $wp_filetype['ext'];
    $type               = $wp_filetype['type'];
    $proper_filename    = $data['proper_filename'];
    return compact('ext', 'type', 'proper_filename');
}
add_filter('wp_check_filetype_and_ext', 'allow_svgs_fix', 10, 4);


// REMOVE COMMENTS FUNCTIONALITY
function remove_admin_menu_items() {
    $remove_menu_items = array(__('Comments'));
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_admin_menu_items');


// CUSTOMIZE POSTS COLUMNS
function customize_columns($columns) {
    unset($columns['comments']);
    return $columns;
}
function initialize_columns() {
    add_filter('manage_posts_columns', 'customize_columns');
    add_filter('manage_pages_columns', 'customize_columns');
}
add_action('admin_init', 'initialize_columns');


// REMOVE STANDARD CONTENT EDITOR FROM SELECTED PAGES
function hide_page_content_editor() {
    global $pagenow;
    if(!('post.php' == $pagenow)) return;

    global $post;
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    if(!isset($post_id)) return;

    if(get_the_title($post_id) == 'Home') { 
        remove_post_type_support('page', 'editor');
    }

    if(get_the_title($post_id) == 'Holding') { 
        remove_post_type_support('page', 'editor');
    }

    if(get_the_title($post_id) == 'Press Material') { 
        remove_post_type_support('page', 'editor');
    }

    // Hide the editor on a page with a specific page template
    // Get the name of the Page Template file.
    // $template_file = get_post_meta($post_id, '_wp_page_template', true);
    // if($template_file == 'my-page-template.php'){ // the filename of the page template
    //   remove_post_type_support('page', 'editor');
    // }
}
add_action('admin_head', 'hide_page_content_editor');


// REMOVE STANDARD CONTENT EDITOR FROM STANDARD POSTS
add_action('init', 'hide_post_content_editor');
function hide_post_content_editor() {
    remove_post_type_support('post', 'editor');
}


// REMOVE POSTS "ADD MEDIA BUTTON"
function remove_media_button() {
    remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','remove_media_button');


// CUSTOMIZE WYSIWYG EDITOR STYLES
function customize_styles($settings) {  

    $style_formats = array(  
        array( 
            'title' => 'Paragraph Font Size',
            'items' => array(
                array(  
                    'title'     => 'Large',  
                    'block'     => 'p',  
                    'classes'   => '-large',
                    'wrapper'   => false,
                    'exact'     => true,
                ),
                array(  
                    'title'     => 'Medium',  
                    'block'     => 'p',  
                    'classes'   => '-medium',
                    'wrapper'   => false,
                    'exact'     => true,
                ),
                array(  
                    'title'     => 'Small',  
                    'block'     => 'p',  
                    'classes'   => '-small',
                    'wrapper'   => false,
                    'exact'     => true,
                )
            )
        ),
        array( 
            'title' => 'Paragraph Alignment',
            'items' => array(
                array(  
                    'title'     => 'Left',  
                    'block'     => 'p',  
                    'classes'   => '-left',
                    'wrapper'   => false,
                    'exact'     => true,
                ),
                array(  
                    'title'     => 'Center',  
                    'block'     => 'p',  
                    'classes'   => '-center',
                    'wrapper'   => false,
                    'exact'     => true,
                ),
                array(  
                    'title'     => 'Right',  
                    'block'     => 'p',  
                    'classes'   => '-right',
                    'wrapper'   => false,
                    'exact'     => true,
                )
            )
        ),   
    );

    $settings['style_formats'] = json_encode($style_formats);
    return $settings;
} 
add_filter('tiny_mce_before_init', 'customize_styles'); 


// CUSTOMIZE WYSIWYG EDITOR TOOLBAR
function customize_visual_toolbar($toolbars) {

    $toolbars['Custom']     = array();
    $toolbars['Custom'][1]  = array('styleselect', 'bold' , 'italic' , 'link', 'unlink');

    if(($key = array_search('code', $toolbars['Full'][2])) !== false) {
        unset($toolbars['Full'][2][$key]);
    }

    unset($toolbars['Basic']);

    return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'customize_visual_toolbar');


// CUSTOMIZE QUICKTAGS EDITOR TOOLBAR
function customize_quicktags_toolbar($qtInit) {
   $qtInit['buttons'] = 'strong,em,link';
   return $qtInit;
}
add_filter('quicktags_settings', 'customize_quicktags_toolbar');


// CUSTOMIZE POSTS METABOXES
function customize_posts_metaboxes() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    remove_meta_box('tagsdiv-post_tag','post','normal');
    //remove_meta_box( 'categorydiv','post','normal' );
    remove_meta_box('commentsdiv', 'product', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('slugdiv', 'post', 'normal');
}
add_action('admin_menu','customize_posts_metaboxes');


// SET GLOBAL SETTINGS PAGE FOR GLOBAL CUSTOM FIELDS 
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'  => 'Global Global Settings',
        'menu_title'  => 'Global Settings',
        'menu_slug'   => 'global-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
  
    acf_add_options_sub_page(array(
        'page_title'  => 'Global Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'global-general-settings',
    ));
  
    acf_add_options_sub_page(array(
        'page_title'  => 'Global Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'global-general-settings',
    ));
}


// SET THEME PRIMARY MENU
$menu_name      = 'Primary';
$menu_exists    = wp_get_nav_menu_object($menu_name);

if(!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title'   =>  __('Home'),
        'menu-item-classes' => 'home',
        'menu-item-url'     => home_url( '/' ), 
        'menu-item-status'  => 'publish')
    );

    // wp_update_nav_menu_item($menu_id, 0, array(
    //     'menu-item-title' =>  __('Custom Page'),
    //     'menu-item-url' => home_url( '/custom/' ), 
    //     'menu-item-status' => 'publish')
    // );

}


// SET CUSTOM NAV HTML STRUCTURE
class Tortuga_Custom_Nav_Menu extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<div class="site-header__sub-nav">';
    }

    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</div>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = array();
        
        if(!empty($item->classes)) {
            $classes = (array) $item->classes;
        }

        $active_class   = '';
        $submenu_class  = '';

        if(in_array('current-menu-item', $classes)) {
            $active_class = ' site-header__link--active';
        } else if(in_array('current-menu-parent', $classes)) {
            $active_class = ' site-header__link--active-parent';
        } else if(in_array('current-menu-ancestor', $classes)) {
            $active_class = ' site-header__link--active-ancestor';
        }

        if(in_array('menu-item-has-children', $classes)) {
            $submenu_class = ' site-header__link--submenu';
        }

        $url = '';

        if(!empty( $item->url)) {
            $url = $item->url;
        }

        $output .= '<a class="site-header__link'. $active_class . '' . $submenu_class . '" href="' . $url . '">' . $item->title . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= '</a>';
    }
}


// ADD CLASS TO CUSTOM POST TYPE NAVIGATION LINKS
add_filter('previous_post_link', 'prev_post_link_attributes');

function prev_post_link_attributes($output) {
    $post_type = get_post_type();

    if($post_type == 'artists') {
        $code = 'class="module__artist-pagination-link module__artist-pagination-link--prev"';
        return str_replace('<a href=', '<a '.$code.' href=', $output);
    } else if($post_type == 'post') {
        $code = 'class="module__post-pagination-link module__post-pagination-link--next"';
        return str_replace('<a href=', '<a '.$code.' href=', $output);
    }
}

add_filter('next_post_link', 'next_post_link_attributes');

function next_post_link_attributes($output) {
    $post_type = get_post_type();

    if($post_type == 'artists') {
        $code = 'class="module__artist-pagination-link module__artist-pagination-link--next"';
        return str_replace('<a href=', '<a '.$code.' href=', $output);
    } else if($post_type == 'post') {
        $code = 'class="module__post-pagination-link module__post-pagination-link--prev"';
        return str_replace('<a href=', '<a '.$code.' href=', $output);
    }
}