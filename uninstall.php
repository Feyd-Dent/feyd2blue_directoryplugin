<?php

/**
 * Trigger this file on uninstall
 */
if ( ! defined('WP_UNINSTALL_PLUGIN') ) {
    die;
}

// Clear database stored data
//one way to do it, simples...
// $sites = get_posts( array( 'post_type' => 'sites', 'numberposts' => -1 ) );

// foreach( $sites as $site) {
//     wp_delete_post( $site->ID, true );
// }

// Access the database directly via sql
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT if FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT if FROM wp_posts)" );