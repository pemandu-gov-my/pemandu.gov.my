<?php
/**
 * Register a new custom post type - gtp_video
 *
 */

add_action( 'init', 'register_cpt_gtp_video' );

function register_cpt_gtp_video() {

    $labels = array( 
        'name' => _x( 'Videos', 'gtp_video' ),
        'singular_name' => _x( 'Video', 'gtp_video' ),
        'add_new' => _x( 'Add New', 'gtp_video' ),
        'add_new_item' => _x( 'Add New Video', 'gtp_video' ),
        'edit_item' => _x( 'Edit Video', 'gtp_video' ),
        'new_item' => _x( 'New Video', 'gtp_video' ),
        'view_item' => _x( 'View Video', 'gtp_video' ),
        'search_items' => _x( 'Search Videos', 'gtp_video' ),
        'not_found' => _x( 'No videos found', 'gtp_video' ),
        'not_found_in_trash' => _x( 'No videos found in Trash', 'gtp_video' ),
        'parent_item_colon' => _x( 'Parent Video:', 'gtp_video' ),
        'menu_name' => _x( 'Videos', 'gtp_video' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Videos for the Media Centre',
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'gtp_video', $args );
}


/**
 * Custom pagination for video grid page
 */

function gtp_video_pagination( $query, $baseURL = '' ) {
	if ( ! $baseURL ) $baseURL = get_bloginfo( 'url' );
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<div class="pagination">';
		// Previous link?
		if ( $page > 1 ) {
			echo '<a href="'.$baseURL.'&paged='.($page-1).'">« Previous</a>';
		}
		// Loop through pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<span class="current">'.$i.'</span>';
			} else {
				echo '<a href="'.$baseURL.'&paged='.$i.'">'.$i.'</a>';
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			echo '<a class="next" href="'.$baseURL.'&paged='.($page+1).'">Next »</a>';
		}
		echo '</div>';
	}
}


/**
 * Remove Post Video Options box from Posts and adds it to Videos 
 */

remove_action('admin_menu', 'p75_videoAdminInit');
add_action('admin_menu', 'gtp_p75_videoAdminInit');

function gtp_p75_videoAdminInit()
{
	if( function_exists("add_meta_box") )
	{
		add_meta_box("p75-video-posting", "Post Video Options", "p75_videoPosting", "gtp_video", "advanced");
	}
	
	add_options_page('Simple Video Embedder Options', 'Video Options', 8, 'videooptions', 'p75_videoOptionsAdmin');
}
