<?php
/*
Plugin Name: WeDevs Project Manager Customizer
Plugin URI: http://wedevs.com
Description: Customize WeDevs Project Manager plugin safely using its filter and hooks.
Version: 1.0
Author: Nurul Amin
Author URI: https://github.com/aminbd07
*/

//File Image url filter for project Manager

function cpm_attachment_thum_url_customize( $url, $project_id, $file_id ) {
    $file = get_post( $file_id );
    if ( $file ) {
        if ( wp_attachment_is_image( $file_id ) ) {
            $thumb = wp_get_attachment_image_src($file_id, 'thumbnail' );
            $url = $thumb[0];
        } else {
            $url = wp_mime_type_icon( $file->post_mime_type );
        }
    }
    
    return $url;
}
add_filter( 'cpm_attachment_url_thum', 'cpm_attachment_thum_url_customize', 1, 3 );

function cpm_attachment_url_customize( $url, $project_id, $file_id ) {
    $url = wp_get_attachment_url( $file_id );
    return $url;
}
add_filter( 'cpm_attachment_url', 'cpm_attachment_url_customize', 1, 3 );


?>
