<?php

/**
 * Trigger this file on Plugin uninstall 
 * 
 * @package WecoderPlugin 
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// $books = get_posts([
//     'post_type' => 'book',
//     'numberposts' => -1
// ]);

// foreach ($books as $book) {
//     wp_delete_post($book->ID, true);
// }

/**
 *  Access the database via SQL 
 *  also we can delete post meta data 
 */
global $wpdb;

$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WEHER post_id NOT IN (SELECT ID FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WEHER object_id NOT IN (SELECT ID FROM wp_posts)");
