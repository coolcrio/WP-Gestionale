<?php
/**
 * @package nav-menu-custom-fields
 * @version 0.1.0
 */
/*
Plugin Name: Nav Menu Custom Fields
*/

/*
 * Saves new field to postmeta for navigation
 */
add_action('wp_update_nav_menu_item', 'custom_nav_update',10, 3);
function custom_nav_update($menu_id, $menu_item_db_id, $args ) {
    if ( is_array($_REQUEST['menu-item-label']) ) {
        $custom_value = $_REQUEST['menu-item-label'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_label', $custom_value );
    }
    
    if ( is_array($_REQUEST['menu-item-stat']) ) {
        $custom_value = $_REQUEST['menu-item-stat'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_stat', $custom_value );
    }
    
    if ( is_array($_REQUEST['menu-item-icon']) ) {
        $custom_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_icon', $custom_value );
    }
}

/*
 * Adds value of new field to $item object that will be passed to     Walker_Nav_Menu_Edit_Custom
 */
add_filter( 'wp_setup_nav_menu_item','custom_nav_item' );
function custom_nav_item($menu_item) {
    $menu_item->label = get_post_meta( $menu_item->ID, '_menu_item_label', true );
    $menu_item->stat = get_post_meta( $menu_item->ID, '_menu_item_stat', true );
    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
    return $menu_item;
}

add_filter( 'wp_edit_nav_menu_walker', 'custom_nav_edit_walker',10,2 );
function custom_nav_edit_walker($walker,$menu_id) {
    return 'Walker_Nav_Menu_Edit_Custom';
}

/**
 * Copied from Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
 
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
/**
 * @see Walker_Nav_Menu::start_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function start_lvl(&$output) {}

/**
 * @see Walker_Nav_Menu::end_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function end_lvl(&$output) {
}

/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @param object $args
 */

function start_el(&$output, $item, $depth, $args) {
    global $_wp_nav_menu_max_depth;
    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    ob_start();
    $item_id = esc_attr( $item->ID );
    $removed_args = array(
        'action',
        'customlink-tab',
        'edit-menu-item',
        'menu-item',
        'page-tab',
        '_wpnonce',
    );
    
    // ! FUNZIONI STATS
    $stat_functions = array(
		array('func' => 0, 'label' => 'Nessuna'),
		array('func' => 'dummy', 'label' => 'Dummy')
	);
	$Stat = new Stat();
	foreach( $Stat->funzioni_badge as $f ) $stat_functions[] = $f;
	// ! END FUNZIONI STATS
	
	// ! ICONE
	$icone = array(""," icomoon-icon-home"," icomoon-icon-home-2"," icomoon-icon-home-3"," icomoon-icon-home-4"," icomoon-icon-home-5"," icomoon-icon-home-6"," icomoon-icon-home-7"," icomoon-icon-home-8"," icomoon-icon-home-9"," icomoon-icon-office"," icomoon-icon-newspaper"," icomoon-icon-pencil"," icomoon-icon-pencil-2"," icomoon-icon-pencil-3"," icomoon-icon-pencil-4"," icomoon-icon-pencil-5"," icomoon-icon-pen"," icomoon-icon-pen-2"," icomoon-icon-feather"," icomoon-icon-brush"," icomoon-icon-color-palette"," icomoon-icon-eyedropper"," icomoon-icon-droplet"," icomoon-icon-picture"," icomoon-icon-pictures"," icomoon-icon-picture-2"," icomoon-icon-picture-3"," icomoon-icon-camera"," icomoon-icon-camera-2"," icomoon-icon-camera-3"," icomoon-icon-camera-4"," icomoon-icon-music"," icomoon-icon-music-2"," icomoon-icon-piano"," icomoon-icon-guitar"," icomoon-icon-headset"," icomoon-icon-headset-2"," icomoon-icon-play"," icomoon-icon-play-2"," icomoon-icon-movie"," icomoon-icon-movie-2"," icomoon-icon-movie-3"," icomoon-icon-film"," icomoon-icon-film-2"," icomoon-icon-film-3"," icomoon-icon-camera-5"," icomoon-icon-camera-6"," icomoon-icon-camera-7"," icomoon-icon-dice"," icomoon-icon-gamepad"," icomoon-icon-gamepad-2"," icomoon-icon-pacman"," icomoon-icon-spades"," icomoon-icon-clubs"," icomoon-icon-diamonds"," icomoon-icon-king"," icomoon-icon-queen"," icomoon-icon-rock"," icomoon-icon-bishop"," icomoon-icon-knight"," icomoon-icon-pawn"," icomoon-icon-chess"," icomoon-icon-announcement"," icomoon-icon-announcement-2"," icomoon-icon-new"," icomoon-icon-broadcast"," icomoon-icon-broadcast-2"," icomoon-icon-podcast"," icomoon-icon-broadcast-3"," icomoon-icon-microphone"," icomoon-icon-microphone-2"," icomoon-icon-microphone-3"," icomoon-icon-book"," icomoon-icon-book-2"," icomoon-icon-books"," icomoon-icon-reading"," icomoon-icon-library"," icomoon-icon-graduation"," icomoon-icon-file"," icomoon-icon-file-2"," icomoon-icon-file-add"," icomoon-icon-file-remove"," icomoon-icon-file-download"," icomoon-icon-new-2"," icomoon-icon-copy"," icomoon-icon-copy-2"," icomoon-icon-stack"," icomoon-icon-folder"," icomoon-icon-folder-2"," icomoon-icon-folder-download"," icomoon-icon-folder-upload"," icomoon-icon-folder-3"," icomoon-icon-folder-4"," icomoon-icon-license"," icomoon-icon-tag"," icomoon-icon-tag-2"," icomoon-icon-tag-3"," icomoon-icon-tag-4"," icomoon-icon-ticket"," icomoon-icon-cart"," icomoon-icon-cart-2"," icomoon-icon-cart-3"," icomoon-icon-cart-4"," icomoon-icon-cart-add"," icomoon-icon-cart-remove"," icomoon-icon-cart-checkout"," icomoon-icon-basket"," icomoon-icon-basket-2"," icomoon-icon-bag"," icomoon-icon-coin"," icomoon-icon-coins"," icomoon-icon-calculate"," icomoon-icon-calculate-2"," icomoon-icon-support"," icomoon-icon-phone"," icomoon-icon-phone-2"," icomoon-icon-address"," icomoon-icon-address-2"," icomoon-icon-notebook"," icomoon-icon-mail"," icomoon-icon-mail-2"," icomoon-icon-mail-3"," icomoon-icon-mail-4"," icomoon-icon-location"," icomoon-icon-location-2"," icomoon-icon-location-3"," icomoon-icon-location-4"," icomoon-icon-compass"," icomoon-icon-compass-2"," icomoon-icon-map"," icomoon-icon-map-2"," icomoon-icon-history"," icomoon-icon-clock"," icomoon-icon-clock-2"," icomoon-icon-stopwatch"," icomoon-icon-alarm"," icomoon-icon-alarm-2"," icomoon-icon-wrist-watch"," icomoon-icon-bell"," icomoon-icon-bell-2"," icomoon-icon-bell-3"," icomoon-icon-bell-4"," icomoon-icon-calendar"," icomoon-icon-calendar-2"," icomoon-icon-calendar-3"," icomoon-icon-printer"," icomoon-icon-printer-2"," icomoon-icon-printer-3"," icomoon-icon-mouse"," icomoon-icon-mouse-2"," icomoon-icon-mouse-3"," icomoon-icon-mouse-4"," icomoon-icon-keyboard"," icomoon-icon-screen"," icomoon-icon-screen-2"," icomoon-icon-laptop"," icomoon-icon-mobile"," icomoon-icon-tablet"," icomoon-icon-mobile-2"," icomoon-icon-tv"," icomoon-icon-tv-2"," icomoon-icon-cabinet"," icomoon-icon-drawer"," icomoon-icon-drawer-2"," icomoon-icon-box"," icomoon-icon-box-add"," icomoon-icon-box-remove"," icomoon-icon-disk"," icomoon-icon-storage"," icomoon-icon-drive"," icomoon-icon-database"," icomoon-icon-undo"," icomoon-icon-redo"," icomoon-icon-flip"," icomoon-icon-flip-2"," icomoon-icon-undo-2"," icomoon-icon-redo-2"," icomoon-icon-forward"," icomoon-icon-reply"," icomoon-icon-reply-2"," icomoon-icon-comments"," icomoon-icon-comments-2"," icomoon-icon-comments-3"," icomoon-icon-comments-4"," icomoon-icon-comments-5"," icomoon-icon-comments-6"," icomoon-icon-comments-7"," icomoon-icon-comments-8"," icomoon-icon-comments-9"," icomoon-icon-comments-10"," icomoon-icon-comments-11"," icomoon-icon-comments-12"," icomoon-icon-comments-13"," icomoon-icon-comments-14"," icomoon-icon-comments-15"," icomoon-icon-user"," icomoon-icon-users"," icomoon-icon-user-2"," icomoon-icon-user-3"," icomoon-icon-user-4"," icomoon-icon-tie"," icomoon-icon-user-5"," icomoon-icon-users-2"," icomoon-icon-vcard"," icomoon-icon-tshirt"," icomoon-icon-hanger"," icomoon-icon-quote"," icomoon-icon-quote-2"," icomoon-icon-busy"," icomoon-icon-busy-2"," icomoon-icon-busy-3"," icomoon-icon-busy-4"," icomoon-icon-loading"," icomoon-icon-loading-2"," icomoon-icon-loading-3"," icomoon-icon-loading-4"," icomoon-icon-loading-5"," icomoon-icon-loading-6"," icomoon-icon-loading-7"," icomoon-icon-loading-8"," icomoon-icon-refresh"," icomoon-icon-microscope"," icomoon-icon-binocular"," icomoon-icon-search"," icomoon-icon-search-2"," icomoon-icon-zoom-in"," icomoon-icon-zoom-out"," icomoon-icon-search-3"," icomoon-icon-search-4"," icomoon-icon-zoom-in-2"," icomoon-icon-zoom-out-2"," icomoon-icon-search-5"," icomoon-icon-expand"," icomoon-icon-expand-2"," icomoon-icon-expand-3"," icomoon-icon-expand-4"," icomoon-icon-full-screen"," icomoon-icon-contract"," icomoon-icon-contract-2"," icomoon-icon-contract-3"," icomoon-icon-contract-4"," icomoon-icon-key"," icomoon-icon-key-2"," icomoon-icon-key-3"," icomoon-icon-keyhole"," icomoon-icon-locked"," icomoon-icon-unlocked"," icomoon-icon-locked-2"," icomoon-icon-locked-3"," icomoon-icon-wrench"," icomoon-icon-wrench-2"," icomoon-icon-equalizer"," icomoon-icon-equalizer-2"," icomoon-icon-cog"," icomoon-icon-cog-2"," icomoon-icon-cogs"," icomoon-icon-factory"," icomoon-icon-tools"," icomoon-icon-hammer"," icomoon-icon-screwdriver"," icomoon-icon-wand"," icomoon-icon-wand-2"," icomoon-icon-health"," icomoon-icon-aid"," icomoon-icon-patch"," icomoon-icon-bug"," icomoon-icon-bug-2"," icomoon-icon-construction"," icomoon-icon-cone"," icomoon-icon-pie"," icomoon-icon-pie-2"," icomoon-icon-graph"," icomoon-icon-bars"," icomoon-icon-bars-2"," icomoon-icon-stats-up"," icomoon-icon-stats-down"," icomoon-icon-chart"," icomoon-icon-stairs"," icomoon-icon-stairs-2"," icomoon-icon-ladder"," icomoon-icon-cake"," icomoon-icon-gift"," icomoon-icon-balloon"," icomoon-icon-rating"," icomoon-icon-rating-2"," icomoon-icon-rating-3"," icomoon-icon-podium"," icomoon-icon-medal"," icomoon-icon-crown"," icomoon-icon-trophy"," icomoon-icon-trophy-2"," icomoon-icon-diamond"," icomoon-icon-cup"," icomoon-icon-bottle"," icomoon-icon-bottle-2"," icomoon-icon-mug"," icomoon-icon-mug-2"," icomoon-icon-food"," icomoon-icon-coffee"," icomoon-icon-leaf"," icomoon-icon-tree"," icomoon-icon-paw"," icomoon-icon-flower"," icomoon-icon-rocket"," icomoon-icon-meter"," icomoon-icon-meter-slow"," icomoon-icon-meter-medium"," icomoon-icon-meter-fast"," icomoon-icon-dashboard"," icomoon-icon-dashboard-2"," icomoon-icon-hammer-2"," icomoon-icon-balance"," icomoon-icon-bomb"," icomoon-icon-fire"," icomoon-icon-fire-2"," icomoon-icon-lab"," icomoon-icon-atom"," icomoon-icon-magnet"," icomoon-icon-skull"," icomoon-icon-lamp"," icomoon-icon-lamp-2"," icomoon-icon-lamp-3"," icomoon-icon-remove"," icomoon-icon-remove-2"," icomoon-icon-remove-3"," icomoon-icon-remove-4"," icomoon-icon-remove-5"," icomoon-icon-remove-6"," icomoon-icon-recycle"," icomoon-icon-pin"," icomoon-icon-briefcase"," icomoon-icon-briefcase-2"," icomoon-icon-briefcase-3"," icomoon-icon-airplane"," icomoon-icon-airplane-2"," icomoon-icon-paper-plane"," icomoon-icon-cars"," icomoon-icon-bus"," icomoon-icon-truck"," icomoon-icon-bike"," icomoon-icon-road"," icomoon-icon-cube"," icomoon-icon-cube-2"," icomoon-icon-puzzle"," icomoon-icon-glasses"," icomoon-icon-glasses-2"," icomoon-icon-3d-glasses"," icomoon-icon-glasses-3"," icomoon-icon-sun-glasses"," icomoon-icon-accessibility"," icomoon-icon-accessibility-2"," icomoon-icon-brain"," icomoon-icon-target"," icomoon-icon-target-2"," icomoon-icon-gun"," icomoon-icon-shield"," icomoon-icon-shield-2"," icomoon-icon-soccer"," icomoon-icon-football"," icomoon-icon-baseball"," icomoon-icon-basketball"," icomoon-icon-hockey"," icomoon-icon-racing"," icomoon-icon-golf"," icomoon-icon-lightning"," icomoon-icon-power"," icomoon-icon-power-2"," icomoon-icon-switch"," icomoon-icon-power-cord"," icomoon-icon-socket"," icomoon-icon-clipboard"," icomoon-icon-clipboard-2"," icomoon-icon-clipboard-3"," icomoon-icon-list-view"," icomoon-icon-list-view-2"," icomoon-icon-playlist"," icomoon-icon-grid-view"," icomoon-icon-grid"," icomoon-icon-grid-view-2"," icomoon-icon-tree-view"," icomoon-icon-menu"," icomoon-icon-menu-2"," icomoon-icon-cloud"," icomoon-icon-cloud-2"," icomoon-icon-cloud-3"," icomoon-icon-cloud-4"," icomoon-icon-cloud-5"," icomoon-icon-download"," icomoon-icon-download-2"," icomoon-icon-upload"," icomoon-icon-upload-2"," icomoon-icon-upload-3"," icomoon-icon-upload-4"," icomoon-icon-upload-5"," icomoon-icon-globe"," icomoon-icon-anchor"," icomoon-icon-network"," icomoon-icon-download-3"," icomoon-icon-link"," icomoon-icon-link-2"," icomoon-icon-link"," icomoon-icon-link-2"," icomoon-icon-link-3"," icomoon-icon-flag"," icomoon-icon-flag-2"," icomoon-icon-flag-3"," icomoon-icon-flag-4"," icomoon-icon-attachment"," icomoon-icon-eye"," icomoon-icon-eye-2"," icomoon-icon-eye-3"," icomoon-icon-eye-4"," icomoon-icon-bookmark"," icomoon-icon-bookmark-2"," icomoon-icon-starburst"," icomoon-icon-snowflake"," icomoon-icon-snow-man"," icomoon-icon-temperature"," icomoon-icon-temperature-2"," icomoon-icon-weather"," icomoon-icon-weather-2"," icomoon-icon-weather-3"," icomoon-icon-windy"," icomoon-icon-fan"," icomoon-icon-umbrella"," icomoon-icon-weather-4"," icomoon-icon-sun"," icomoon-icon-contrast"," icomoon-icon-contrast-2"," icomoon-icon-moon"," icomoon-icon-bed"," icomoon-icon-bed-2"," icomoon-icon-star"," icomoon-icon-star-2"," icomoon-icon-star-3"," icomoon-icon-star-4"," icomoon-icon-star-5"," icomoon-icon-star-6"," icomoon-icon-heart"," icomoon-icon-heart-2"," icomoon-icon-heart-3"," icomoon-icon-heart-4"," icomoon-icon-heart-5"," icomoon-icon-heart-6"," icomoon-icon-heart-7"," icomoon-icon-heart-8"," icomoon-icon-thumbs-up"," icomoon-icon-thumbs-down"," icomoon-icon-thumbs-up-2"," icomoon-icon-thumbs-down-2"," icomoon-icon-thumbs-up-3"," icomoon-icon-thumbs-down-3"," icomoon-icon-people"," icomoon-icon-man"," icomoon-icon-male"," icomoon-icon-woman"," icomoon-icon-female"," icomoon-icon-peace"," icomoon-icon-yin-yang"," icomoon-icon-ampersand"," icomoon-icon-ampersand-2"," icomoon-icon-happy"," icomoon-icon-happy-2"," icomoon-icon-smiley"," icomoon-icon-smiley-2"," icomoon-icon-neutral"," icomoon-icon-neutral-2"," icomoon-icon-sad"," icomoon-icon-sad-2"," icomoon-icon-shocked"," icomoon-icon-shocked-2"," icomoon-icon-pointer"," icomoon-icon-hand"," icomoon-icon-move"," icomoon-icon-resize"," icomoon-icon-resize-2"," icomoon-icon-warning"," icomoon-icon-warning-2"," icomoon-icon-plus"," icomoon-icon-minus"," icomoon-icon-help"," icomoon-icon-help-2"," icomoon-icon-info"," icomoon-icon-info-2"," icomoon-icon-blocked"," icomoon-icon-blocked-2"," icomoon-icon-error"," icomoon-icon-cancel"," icomoon-icon-cancel-2"," icomoon-icon-cancel-3"," icomoon-icon-cancel-4"," icomoon-icon-checkmark"," icomoon-icon-checkmark-2"," icomoon-icon-checkmark-3"," icomoon-icon-spell-check"," icomoon-icon-minus-2"," icomoon-icon-minus-3"," icomoon-icon-plus-2"," icomoon-icon-plus-3"," icomoon-icon-enter"," icomoon-icon-exit"," icomoon-icon-exit-2"," icomoon-icon-play"," icomoon-icon-pause"," icomoon-icon-stop"," icomoon-icon-volume-high"," icomoon-icon-volume-medium"," icomoon-icon-volume-low"," icomoon-icon-mute"," icomoon-icon-mute-2"," icomoon-icon-volume-increase"," icomoon-icon-volume-decrease"," icomoon-icon-volume"," icomoon-icon-volume-2"," icomoon-icon-volume-3"," icomoon-icon-volume-4"," icomoon-icon-volume-5"," icomoon-icon-volume-6"," icomoon-icon-next"," icomoon-icon-previous"," icomoon-icon-first"," icomoon-icon-last"," icomoon-icon-loop"," icomoon-icon-loop-2"," icomoon-icon-loop-3"," icomoon-icon-shuffle"," icomoon-icon-arrow-first"," icomoon-icon-arrow-last"," icomoon-icon-arrow-up"," icomoon-icon-arrow-right"," icomoon-icon-arrow-down"," icomoon-icon-arrow-left"," icomoon-icon-arrow-up-2"," icomoon-icon-arrow-right-2"," icomoon-icon-arrow-down-2"," icomoon-icon-arrow-left-2"," icomoon-icon-arrow-up-left"," icomoon-icon-arrow-up-3"," icomoon-icon-arrow-up-right"," icomoon-icon-arrow-right-3"," icomoon-icon-arrow-down-right"," icomoon-icon-arrow-down-3"," icomoon-icon-arrow-down-left"," icomoon-icon-arrow-left-3"," icomoon-icon-arrow-up-left-2"," icomoon-icon-arrow-up-4"," icomoon-icon-arrow-up-right-2"," icomoon-icon-arrow-right-4"," icomoon-icon-arrow-down-right-2"," icomoon-icon-arrow-down-4"," icomoon-icon-arrow-down-left-2"," icomoon-icon-arrow-left-4"," icomoon-icon-arrow-up-left-3"," icomoon-icon-arrow-up-5"," icomoon-icon-arrow-up-right-3"," icomoon-icon-arrow-right-5"," icomoon-icon-arrow-down-right-3"," icomoon-icon-arrow-down-5"," icomoon-icon-arrow-down-left-3"," icomoon-icon-arrow-left-5"," icomoon-icon-arrow-up-6"," icomoon-icon-arrow-right-6"," icomoon-icon-arrow-down-6"," icomoon-icon-arrow-left-6"," icomoon-icon-arrow-up-7"," icomoon-icon-arrow-right-7"," icomoon-icon-arrow-down-7"," icomoon-icon-arrow-left-7"," icomoon-icon-arrow-up-8"," icomoon-icon-arrow-right-8"," icomoon-icon-arrow-down-8"," icomoon-icon-arrow-left-8"," icomoon-icon-arrow-up-9"," icomoon-icon-arrow-right-9"," icomoon-icon-arrow-down-9"," icomoon-icon-arrow-left-9"," icomoon-icon-arrow-up-10"," icomoon-icon-arrow-right-10"," icomoon-icon-arrow-down-10"," icomoon-icon-arrow-left-10"," icomoon-icon-menu"," icomoon-icon-enter-2"," icomoon-icon-enter-3"," icomoon-icon-backspace"," icomoon-icon-backspace-2"," icomoon-icon-tab"," icomoon-icon-tab-2"," icomoon-icon-command"," icomoon-icon-checkbox"," icomoon-icon-checkbox-unchecked"," icomoon-icon-checkbox-partial"," icomoon-icon-checkbox-2"," icomoon-icon-checkbox-unchecked-2"," icomoon-icon-checkbox-partial-2"," icomoon-icon-radio-checked"," icomoon-icon-radio-unchecked"," icomoon-icon-crop"," icomoon-icon-vector"," icomoon-icon-rulers"," icomoon-icon-scissors"," icomoon-icon-scissors-2"," icomoon-icon-filter"," icomoon-icon-type"," icomoon-icon-font-size"," icomoon-icon-bold"," icomoon-icon-italic"," icomoon-icon-underline"," icomoon-icon-font"," icomoon-icon-paragraph-left"," icomoon-icon-paragraph-center"," icomoon-icon-paragraph-right"," icomoon-icon-left-to-right"," icomoon-icon-right-to-left"," icomoon-icon-out"," icomoon-icon-out-2"," icomoon-icon-popout"," icomoon-icon-embed"," icomoon-icon-code"," icomoon-icon-seven-segment"," icomoon-icon-seven-segment-2"," icomoon-icon-seven-segment-3"," icomoon-icon-seven-segment-4"," icomoon-icon-seven-segment-5"," icomoon-icon-seven-segment-6"," icomoon-icon-seven-segment-7"," icomoon-icon-seven-segment-8"," icomoon-icon-seven-segment-9"," icomoon-icon-seven-segment-10"," icomoon-icon-bluetooth"," icomoon-icon-share"," icomoon-icon-share-2"," icomoon-icon-mail"," icomoon-icon-mail-2"," icomoon-icon-google-plus"," icomoon-icon-google-plus-2"," icomoon-icon-google-plus-3"," icomoon-icon-gplus"," icomoon-icon-facebook"," icomoon-icon-facebook-2"," icomoon-icon-facebook-3"," icomoon-icon-facebook-4"," icomoon-icon-twitter"," icomoon-icon-twitter-2"," icomoon-icon-twitter-3"," icomoon-icon-feed"," icomoon-icon-feed-2"," icomoon-icon-feed-3"," icomoon-icon-youtube"," icomoon-icon-youtube-2"," icomoon-icon-vimeo"," icomoon-icon-vimeo-2"," icomoon-icon-flickr"," icomoon-icon-flickr-2"," icomoon-icon-flickr-3"," icomoon-icon-picassa"," icomoon-icon-picassa-2"," icomoon-icon-dribbble"," icomoon-icon-dribbble-2"," icomoon-icon-dribbble-3"," icomoon-icon-forrst"," icomoon-icon-forrst-2"," icomoon-icon-deviantart"," icomoon-icon-deviantart-2"," icomoon-icon-github"," icomoon-icon-github-2"," icomoon-icon-github-3"," icomoon-icon-github-4"," icomoon-icon-github-5"," icomoon-icon-github-6"," icomoon-icon-git"," icomoon-icon-github-7"," icomoon-icon-wordpress"," icomoon-icon-wordpress-2"," icomoon-icon-blogger"," icomoon-icon-blogger-2"," icomoon-icon-tumblr"," icomoon-icon-tumblr-2"," icomoon-icon-yahoo"," icomoon-icon-yahoo-2"," icomoon-icon-amazon"," icomoon-icon-amazon-2"," icomoon-icon-apple"," icomoon-icon-finder"," icomoon-icon-android"," icomoon-icon-windows"," icomoon-icon-soundcloud"," icomoon-icon-soundcloud-2"," icomoon-icon-skype"," icomoon-icon-reddit"," icomoon-icon-linkedin"," icomoon-icon-lastfm"," icomoon-icon-lastfm-2"," icomoon-icon-delicious"," icomoon-icon-stumbleupon"," icomoon-icon-stumbleupon-2"," icomoon-icon-pinterest"," icomoon-icon-pinterest-2"," icomoon-icon-xing"," icomoon-icon-libreoffice"," icomoon-icon-file-pdf"," icomoon-icon-file-openoffice"," icomoon-icon-file-word"," icomoon-icon-file-excel"," icomoon-icon-file-powerpoint"," icomoon-icon-file-zip"," icomoon-icon-file-xml"," icomoon-icon-file-css"," icomoon-icon-html5"," icomoon-icon-html5-2"," icomoon-icon-css3"," icomoon-icon-chrome"," icomoon-icon-firefox"," icomoon-icon-IE"," icomoon-icon-opera"," icomoon-icon-safari"," icomoon-icon-IcoMoon"," brocco-icon-warning"," brocco-icon-cloud"," brocco-icon-locked"," brocco-icon-inbox"," brocco-icon-comment"," brocco-icon-mic"," brocco-icon-envelope"," brocco-icon-briefcase"," brocco-icon-cart"," brocco-icon-contrast"," brocco-icon-clock"," brocco-icon-user"," brocco-icon-cog"," brocco-icon-music"," brocco-icon-twitter"," brocco-icon-pencil"," brocco-icon-frame"," brocco-icon-switch"," brocco-icon-star"," brocco-icon-key"," brocco-icon-chart"," brocco-icon-apple"," brocco-icon-file"," brocco-icon-plus"," brocco-icon-minus"," brocco-icon-picture"," brocco-icon-folder"," brocco-icon-camera"," brocco-icon-search"," brocco-icon-dribbble"," brocco-icon-forrst"," brocco-icon-feed"," brocco-icon-blocked"," brocco-icon-target"," brocco-icon-play"," brocco-icon-pause"," brocco-icon-bug"," brocco-icon-console"," brocco-icon-film"," brocco-icon-type"," brocco-icon-home"," brocco-icon-earth"," brocco-icon-location"," brocco-icon-info"," brocco-icon-eye"," brocco-icon-heart"," brocco-icon-bookmark"," brocco-icon-wrench"," brocco-icon-calendar"," brocco-icon-window"," brocco-icon-monitor"," brocco-icon-mobile"," brocco-icon-droplet"," brocco-icon-mouse"," brocco-icon-refresh"," brocco-icon-location-2"," brocco-icon-tag"," brocco-icon-phone"," brocco-icon-star-2"," brocco-icon-pointer"," brocco-icon-thumbs-up"," brocco-icon-thumbs-down"," brocco-icon-headphones"," brocco-icon-move"," brocco-icon-checkmark"," brocco-icon-cancel"," brocco-icon-skype"," brocco-icon-gift"," brocco-icon-cone"," brocco-icon-alarm"," brocco-icon-coffee"," brocco-icon-basket"," brocco-icon-flag"," brocco-icon-ipod"," brocco-icon-trashcan"," brocco-icon-bolt"," brocco-icon-ampersand"," brocco-icon-compass"," brocco-icon-list"," brocco-icon-grid"," brocco-icon-volume"," brocco-icon-volume-2"," brocco-icon-stats"," brocco-icon-target-2"," brocco-icon-forward"," brocco-icon-paperclip"," brocco-icon-keyboard"," brocco-icon-crop"," brocco-icon-floppy"," brocco-icon-filter"," brocco-icon-trophy"," brocco-icon-diary"," brocco-icon-address-book"," brocco-icon-stop"," brocco-icon-circle"," brocco-icon-shit"," brocco-icon-bookmark-2"," brocco-icon-camera-2"," brocco-icon-lamp"," brocco-icon-disk"," brocco-icon-button"," brocco-icon-database"," brocco-icon-credit-card"," brocco-icon-atom"," brocco-icon-winsows"," brocco-icon-target-3"," brocco-icon-battery"," brocco-icon-code"," cut-icon-arrow-right"," cut-icon-arrow-left"," cut-icon-arrow-up"," cut-icon-arrow-down"," cut-icon-plus"," cut-icon-minus"," cut-icon-stats"," cut-icon-broadcast"," cut-icon-enter"," cut-icon-download"," cut-icon-mobile"," cut-icon-mobile-2"," cut-icon-screen"," cut-icon-stats-2"," cut-icon-user"," cut-icon-heart"," cut-icon-heart-2"," cut-icon-frame"," cut-icon-plus-2"," cut-icon-minus-2"," cut-icon-checkbox-checked"," cut-icon-alert"," cut-icon-comment"," cut-icon-chat"," cut-icon-bookmark"," cut-icon-locked"," cut-icon-unlock"," cut-icon-film"," cut-icon-camera"," cut-icon-camera-2"," cut-icon-painting"," cut-icon-painting-2"," cut-icon-reload"," cut-icon-credit-card"," cut-icon-vcard"," cut-icon-marker"," cut-icon-list"," cut-icon-file"," cut-icon-thumbs-up"," cut-icon-printer"," cut-icon-untitled"," cut-icon-popout"," cut-icon-popout-2"," cut-icon-printer-2"," cut-icon-battery-full"," cut-icon-battery-low"," cut-icon-battery"," cut-icon-hash"," cut-icon-trashcan"," cut-icon-crop"," cut-icon-apple"," cut-icon-cart"," cut-icon-pause"," cut-icon-play"," cut-icon-next"," cut-icon-previous"," cut-icon-next-2"," cut-icon-previous-2"," cut-icon-record"," cut-icon-eject"," cut-icon-disk"," cut-icon-equalizer"," cut-icon-desktop"," cut-icon-grid"," cut-icon-frame-2"," cut-icon-board"," cut-icon-shrink"," cut-icon-expand"," cut-icon-tree"," cut-icon-paper-plane"," entypo-icon-phone"," entypo-icon-mobile"," entypo-icon-mouse"," entypo-icon-address"," entypo-icon-email"," entypo-icon-write"," entypo-icon-attachment"," entypo-icon-reply"," entypo-icon-reply-to-all"," entypo-icon-forward"," entypo-icon-user"," entypo-icon-users"," entypo-icon-contact"," entypo-icon-card"," entypo-icon-export"," entypo-icon-location"," entypo-icon-map"," entypo-icon-compass"," entypo-icon-direction"," entypo-icon-center"," entypo-icon-share"," entypo-icon-heart"," entypo-icon-heart-2"," entypo-icon-star"," entypo-icon-star-2"," entypo-icon-thumbs-up"," entypo-icon-chat"," entypo-icon-comment"," entypo-icon-quote"," entypo-icon-printer"," entypo-icon-alert"," entypo-icon-link"," entypo-icon-flag"," entypo-icon-settings"," entypo-icon-search"," entypo-icon-trophy"," entypo-icon-price"," entypo-icon-camera"," entypo-icon-sleep"," entypo-icon-palette"," entypo-icon-leaf"," entypo-icon-music"," entypo-icon-shopping"," entypo-icon-flight"," entypo-icon-support"," entypo-icon-google-circles"," entypo-icon-eye"," entypo-icon-clock"," entypo-icon-microphone"," entypo-icon-calendar"," entypo-icon-flash"," entypo-icon-time"," entypo-icon-rss"," entypo-icon-locked"," entypo-icon-unlocked"," entypo-icon-checkmark"," entypo-icon-cancel"," entypo-icon-minus"," entypo-icon-plus"," entypo-icon-close"," entypo-icon-minus-2"," entypo-icon-plus-2"," entypo-icon-blocked"," entypo-icon-info"," entypo-icon-info-circle"," entypo-icon-help"," entypo-icon-help-2"," entypo-icon-warning"," entypo-icon-reload-CW"," entypo-icon-reload-CCW"," entypo-icon-shuffle"," entypo-icon-back"," entypo-icon-arrow"," entypo-icon-retweet"," entypo-icon-list"," entypo-icon-add"," entypo-icon-grid"," entypo-icon-document"," entypo-icon-document-2"," entypo-icon-documents"," entypo-icon-landscape"," entypo-icon-images"," entypo-icon-movie"," entypo-icon-song"," entypo-icon-folder"," entypo-icon-archive"," entypo-icon-trashcan"," entypo-icon-upload"," entypo-icon-download"," entypo-icon-install"," entypo-icon-cloud"," entypo-icon-upload-2"," entypo-icon-play"," entypo-icon-pause"," entypo-icon-record"," entypo-icon-stop"," entypo-icon-fast-forward"," entypo-icon-fast-backward"," entypo-icon-first"," entypo-icon-last"," entypo-icon-full-screen"," entypo-icon-collapse"," entypo-icon-volume"," entypo-icon-sound"," entypo-icon-mute"," entypo-icon-arrow-2"," entypo-icon-arrow-3"," entypo-icon-arrow-4"," entypo-icon-arrow-5"," entypo-icon-arrow-6"," entypo-icon-arrow-7"," entypo-icon-arrow-8"," entypo-icon-arrow-9"," entypo-icon-arrow-10"," entypo-icon-arrow-11"," entypo-icon-arrow-12"," entypo-icon-arrow-13"," entypo-icon-arrow-14"," entypo-icon-arrow-15"," entypo-icon-arrow-16"," entypo-icon-arrow-17"," entypo-icon-arrow-18"," entypo-icon-arrow-19"," entypo-icon-arrow-20"," entypo-icon-arrow-21"," entypo-icon-triangle"," entypo-icon-triangle-2"," entypo-icon-triangle-3"," entypo-icon-triangle-4"," entypo-icon-code"," entypo-icon-battery"," entypo-icon-battery-2"," entypo-icon-battery-3"," entypo-icon-battery-4"," entypo-icon-battery-5"," entypo-icon-history"," entypo-icon-back-2"," entypo-icon-sun"," entypo-icon-sun-2"," entypo-icon-light-bulb"," entypo-icon-browser"," entypo-icon-publish"," entypo-icon-screen"," entypo-icon-arrow-22"," entypo-icon-broadcast"," entypo-icon-globe"," entypo-icon-square"," entypo-icon-inbox"," entypo-icon-network"," entypo-icon-feather"," entypo-icon-keyboard"," entypo-icon-home"," entypo-icon-bookmark"," entypo-icon-book"," entypo-icon-popup"," entypo-icon-search-2"," entypo-icon-dots-three"," entypo-icon-dots-two"," entypo-icon-dot"," entypo-icon-creative-commons"," entypo-icon-cd"," entypo-icon-suitcase"," entypo-icon-suitcase-2"," minia-icon-home"," minia-icon-list"," minia-icon-book"," minia-icon-pencil"," minia-icon-bookmark"," minia-icon-pointer"," minia-icon-cloud"," minia-icon-cloud-ul"," minia-icon-cloud-dl"," minia-icon-search"," minia-icon-folder"," minia-icon-trashcan"," minia-icon-droplet"," minia-icon-tag"," minia-icon-moon"," minia-icon-eye"," minia-icon-target"," minia-icon-blocked"," minia-icon-switch"," minia-icon-goal"," minia-icon-location"," minia-icon-close"," minia-icon-checkmark"," minia-icon-munis"," minia-icon-plus"," minia-icon-close-2"," minia-icon-divide"," minia-icon-minus"," minia-icon-plus-2"," minia-icon-equals"," minia-icon-cancel"," minia-icon-minus-2"," minia-icon-checkmark-2"," minia-icon-equals-2"," minia-icon-asterisk"," minia-icon-mobile"," minia-icon-tablet"," minia-icon-phone"," minia-icon-bars"," minia-icon-stack"," minia-icon-battery"," minia-icon-battery-2"," minia-icon-battery-3"," minia-icon-calculator"," minia-icon-bolt"," minia-icon-list-2"," minia-icon-grid"," minia-icon-list-3"," minia-icon-list-4"," minia-icon-layout"," minia-icon-equalizer"," minia-icon-equalizer-2"," minia-icon-cog"," minia-icon-window"," minia-icon-window-2"," minia-icon-window-3"," minia-icon-window-4"," minia-icon-locked"," minia-icon-unlocked"," minia-icon-shield"," minia-icon-cart"," minia-icon-console"," minia-icon-office"," minia-icon-basket"," minia-icon-suitcase"," minia-icon-airplane"," minia-icon-file-download"," minia-icon-file-upload"," minia-icon-file"," minia-icon-file-add"," minia-icon-file-remove"," minia-icon-bars-2"," minia-icon-chart"," minia-icon-stats"," minia-icon-arrow-right"," minia-icon-arrow-left"," minia-icon-arrow-down"," minia-icon-arrow-up"," minia-icon-arrow-right-2"," minia-icon-arrow-left-2"," minia-icon-arrow-up-2"," minia-icon-arrow-down-2"," minia-icon-arrow-down-left"," minia-icon-arrow-down-right"," minia-icon-arrow-up-left"," minia-icon-arrow-up-right"," minia-icon-arrow-left-3"," minia-icon-arrow-right-3"," minia-icon-arrow-down-3"," minia-icon-arrow-up-3"," minia-icon-move"," minia-icon-movie"," minia-icon-refresh"," minia-icon-picture"," minia-icon-music"," minia-icon-disk"," minia-icon-camera"," minia-icon-film"," minia-icon-tablet-2"," minia-icon-ipod"," minia-icon-camera-2"," minia-icon-mouse"," minia-icon-volume"," minia-icon-monitor"," minia-icon-thumbs-up"," minia-icon-thumbs-down"," minia-icon-neutral"," minia-icon-grin"," minia-icon-heart"," minia-icon-pacman"," minia-icon-star"," minia-icon-star-2"," minia-icon-envelope"," minia-icon-comment"," minia-icon-comment-2"," minia-icon-user"," minia-icon-download"," minia-icon-upload"," minia-icon-inbox"," minia-icon-partial"," minia-icon-unchecked"," minia-icon-checked"," minia-icon-circles"," minia-icon-pencil-2"," minia-icon-flag"," minia-icon-link"," minia-icon-stop"," minia-icon-play"," minia-icon-pause"," minia-icon-next"," minia-icon-previous"," minia-icon-drink"," minia-icon-drink-2"," minia-icon-hamburger"," minia-icon-mug"," minia-icon-calendar"," minia-icon-clock"," minia-icon-calendar-2"," minia-icon-compass"," iconic-icon-chat"," iconic-icon-chat-alt-stroke"," iconic-icon-chat-alt-fill"," iconic-icon-comment-alt1-stroke"," iconic-icon-comment-alt1-fill"," iconic-icon-comment-stroke"," iconic-icon-comment-fill"," iconic-icon-comment-alt2-stroke"," iconic-icon-comment-alt2-fill"," iconic-icon-checkmark"," iconic-icon-check-alt"," iconic-icon-x"," iconic-icon-x-altx-alt"," iconic-icon-denied"," iconic-icon-cursor"," iconic-icon-rss"," iconic-icon-rss-alt"," iconic-icon-wrench"," iconic-icon-dial"," iconic-icon-cog"," iconic-icon-calendar"," iconic-icon-calendar-alt-stroke"," iconic-icon-calendar-alt-fill"," iconic-icon-share"," iconic-icon-mail"," iconic-icon-heart-stroke"," iconic-icon-heart-fill"," iconic-icon-movie"," iconic-icon-document-alt-stroke"," iconic-icon-document-alt-fill"," iconic-icon-document-stroke"," iconic-icon-document-fill"," iconic-icon-plus"," iconic-icon-plus-alt"," iconic-icon-minus"," iconic-icon-minus-alt"," iconic-icon-pin"," iconic-icon-link"," iconic-icon-bolt"," iconic-icon-move"," iconic-icon-move-alt1"," iconic-icon-move-alt2"," iconic-icon-equalizer"," iconic-icon-award-fill"," iconic-icon-award-stroke"," iconic-icon-magnifying-glass"," iconic-icon-trash-stroke"," iconic-icon-trash-fill"," iconic-icon-beaker-alt"," iconic-icon-beaker"," iconic-icon-key-stroke"," iconic-icon-key-fill"," iconic-icon-new-window"," iconic-icon-lightbulb"," iconic-icon-spin-alt"," iconic-icon-spin"," iconic-icon-curved-arrow"," iconic-icon-undo"," iconic-icon-reload"," iconic-icon-reload-alt"," iconic-icon-loop"," iconic-icon-loop-alt1"," iconic-icon-loop-alt2"," iconic-icon-loop-alt3"," iconic-icon-loop-alt4"," iconic-icon-transfer"," iconic-icon-move-vertical"," iconic-icon-move-vertical-alt1"," iconic-icon-move-vertical-alt2"," iconic-icon-move-horizontal"," iconic-icon-move-horizontal-alt1"," iconic-icon-move-horizontal-alt2"," iconic-icon-arrow-left"," iconic-icon-arrow-left-alt1"," iconic-icon-arrow-left-alt2"," iconic-icon-arrow-right"," iconic-icon-arrow-right-alt1"," iconic-icon-arrow-right-alt2"," iconic-icon-arrow-up"," iconic-icon-arrow-up-alt1"," iconic-icon-arrow-up-alt2"," iconic-icon-arrow-down"," iconic-icon-arrow-down-alt1"," iconic-icon-arrow-down-alt2"," iconic-icon-cd"," iconic-icon-steering-wheel"," iconic-icon-microphone"," iconic-icon-headphones"," iconic-icon-volume"," iconic-icon-volume-mute"," iconic-icon-play"," iconic-icon-pause"," iconic-icon-stop"," iconic-icon-eject"," iconic-icon-first"," iconic-icon-last"," iconic-icon-play-alt"," iconic-icon-fullscreen-exit"," iconic-icon-fullscreen-exit-alt"," iconic-icon-fullscreen"," iconic-icon-fullscreen-alt"," iconic-icon-iphone"," iconic-icon-battery-empty"," iconic-icon-battery-half"," iconic-icon-battery-full"," iconic-icon-battery-charging"," iconic-icon-compass"," iconic-icon-box"," iconic-icon-folder-stroke"," iconic-icon-folder-fill"," iconic-icon-at"," iconic-icon-ampersand"," iconic-icon-info"," iconic-icon-question-mark"," iconic-icon-pilcrow"," iconic-icon-hash"," iconic-icon-left-quote"," iconic-icon-right-quote"," iconic-icon-left-quote-alt"," iconic-icon-right-quote-alt"," iconic-icon-article"," iconic-icon-read-more"," iconic-icon-list"," iconic-icon-list-nested"," iconic-icon-book"," iconic-icon-book-alt"," iconic-icon-book-alt2"," iconic-icon-pen"," iconic-icon-pen-alt-stroke"," iconic-icon-pen-alt-fill"," iconic-icon-pen-alt2"," iconic-icon-brush"," iconic-icon-brush-alt"," iconic-icon-eyedropper"," iconic-icon-layers-alt"," iconic-icon-layers"," iconic-icon-image"," iconic-icon-camera"," iconic-icon-aperture"," iconic-icon-aperture-alt"," iconic-icon-chart"," iconic-icon-chart-alt"," iconic-icon-bars"," iconic-icon-bars-alt"," iconic-icon-eye"," iconic-icon-user"," iconic-icon-home"," iconic-icon-clock"," iconic-icon-lock-stroke"," iconic-icon-lock-fill"," iconic-icon-unlock-stroke"," iconic-icon-unlock-fill"," iconic-icon-tag-stroke"," iconic-icon-tag-fill"," iconic-icon-sun-stroke"," iconic-icon-sun-fill"," iconic-icon-moon-stroke"," iconic-icon-moon-fill"," iconic-icon-cloud"," iconic-icon-rain"," iconic-icon-umbrella"," iconic-icon-star"," iconic-icon-map-pin-stroke"," iconic-icon-map-pin-fill"," iconic-icon-map-pin-alt"," iconic-icon-target"," iconic-icon-download"," iconic-icon-upload"," iconic-icon-cloud-download"," iconic-icon-cloud-upload"," iconic-icon-fork"," iconic-icon-paperclip"," meteo-icon-sunrise"," meteo-icon-sun"," meteo-icon-moon"," meteo-icon-sun-2"," meteo-icon-windy"," meteo-icon-wind"," meteo-icon-snowflake"," meteo-icon-cloudy"," meteo-icon-cloud"," meteo-icon-weather"," meteo-icon-weather-2"," meteo-icon-weather-3"," meteo-icon-lines"," meteo-icon-cloud-2"," meteo-icon-lightning"," meteo-icon-lightning-2"," meteo-icon-rainy"," meteo-icon-rainy-2"," meteo-icon-windy-2"," meteo-icon-windy-3"," meteo-icon-snowy"," meteo-icon-snowy-2"," meteo-icon-snowy-3"," meteo-icon-weather-4"," meteo-icon-cloudy-2"," meteo-icon-cloud-3"," meteo-icon-lightning-3"," meteo-icon-sun-3"," meteo-icon-moon-2"," meteo-icon-cloudy-3"," meteo-icon-cloud-4"," meteo-icon-cloud-5"," meteo-icon-lightning-4"," meteo-icon-rainy-3"," meteo-icon-rainy-4"," meteo-icon-windy-4"," meteo-icon-windy-5"," meteo-icon-snowy-4"," meteo-icon-snowy-5"," meteo-icon-weather-5"," meteo-icon-cloudy-4"," meteo-icon-lightning-5"," meteo-icon-thermometer"," meteo-icon-compass"," meteo-icon-none"," meteo-icon-Celsius"," meteo-icon-Fahrenheit"," silk-icon-expand"," silk-icon-expand-2"," silk-icon-untitled"," silk-icon-shrink"," silk-icon-plus"," silk-icon-minus"," silk-icon-notes"," silk-icon-notebook"," silk-icon-popout"," silk-icon-popout-2"," silk-icon-arrow-down"," silk-icon-arrow-up"," silk-icon-arrow-left"," silk-icon-arrow-right"," silk-icon-arrow-down-2"," silk-icon-arrow-up-2"," silk-icon-arrow-left-2"," silk-icon-arrow-right-2"," silk-icon-target"," silk-icon-clock"," silk-icon-cloud"," silk-icon-cloud-2"," silk-icon-mobile"," silk-icon-expand-3"," silk-icon-contract"," silk-icon-chart"," silk-icon-checkmark"," silk-icon-cancel"," silk-icon-enter"," silk-icon-exit"," silk-icon-download"," silk-icon-upload"," silk-icon-heart"," silk-icon-heart-2"," silk-icon-heart-3"," silk-icon-vector"," silk-icon-vector-2"," silk-icon-star"," silk-icon-star-half"," silk-icon-star-empty"," silk-icon-eraser"," silk-icon-pencil"," silk-icon-calendar"," silk-icon-marker"," silk-icon-arrow"," silk-icon-arrow-2"," silk-icon-undo"," silk-icon-redo"," silk-icon-console"," silk-icon-picture"," silk-icon-droplet"," silk-icon-droplet-2"," silk-icon-arrow-up-3"," silk-icon-arrow-down-3"," silk-icon-arrow-left-3"," silk-icon-arrow-right-3"," silk-icon-pictures"," silk-icon-frame"," silk-icon-cloud-play"," silk-icon-cover-flow"," silk-icon-columns"," silk-icon-list"," silk-icon-icons"," silk-icon-home"," silk-icon-office"," silk-icon-camera"," silk-icon-redo-2"," silk-icon-refresh"," silk-icon-undo-2"," silk-icon-credit-card"," silk-icon-podcast"," silk-icon-share"," silk-icon-calculator"," silk-icon-play"," silk-icon-search"," silk-icon-chat"," silk-icon-umbrella"," silk-icon-drops"," silk-icon-sun"," silk-icon-battery-empty"," silk-icon-battery-charging"," silk-icon-battery-low"," silk-icon-battery"," silk-icon-battery-full"," silk-icon-battery-warning"," silk-icon-grass"," silk-icon-food"," silk-icon-pointer"," silk-icon-drawer"," silk-icon-envelope"," silk-icon-rainbow"," silk-icon-trashcan"," silk-icon-lollipop"," silk-icon-contrast"," silk-icon-crop"," silk-icon-untitled-2"," silk-icon-boat"," silk-icon-puzzle"," silk-icon-tshirt"," silk-icon-yinyang"," silk-icon-watch"," silk-icon-bars"," silk-icon-wand"," silk-icon-music"," silk-icon-music-2"," silk-icon-checklist"," silk-icon-notes-2"," silk-icon-power"," silk-icon-folder"," silk-icon-broadcast"," silk-icon-locked"," silk-icon-unlocked"," silk-icon-desktop"," silk-icon-warning"," silk-icon-happy"," silk-icon-fence"," typ-icon-battery-low"," typ-icon-battery"," typ-icon-battery-full"," typ-icon-battery-charging"," typ-icon-plus"," typ-icon-cross"," typ-icon-arrow-right"," typ-icon-arrow-left"," typ-icon-pencil"," typ-icon-search"," typ-icon-grid"," typ-icon-list"," typ-icon-star"," typ-icon-heart"," typ-icon-back"," typ-icon-forward"," typ-icon-map-marker"," typ-icon-phone"," typ-icon-home"," typ-icon-camera"," typ-icon-arrow-left-2"," typ-icon-arrow-right-2"," typ-icon-arrow-up"," typ-icon-arrow-down"," typ-icon-refresh"," typ-icon-refresh-2"," typ-icon-escape"," typ-icon-repeat"," typ-icon-loop"," typ-icon-shuffle"," typ-icon-feed"," typ-icon-cog"," typ-icon-wrench"," typ-icon-bars"," typ-icon-chart"," typ-icon-stats"," typ-icon-eye"," typ-icon-zoom-out"," typ-icon-zoom-in"," typ-icon-export"," typ-icon-user"," typ-icon-users"," typ-icon-microphone"," typ-icon-mail"," typ-icon-comment"," typ-icon-trashcan"," typ-icon-delete"," typ-icon-infinity"," typ-icon-key"," typ-icon-globe"," typ-icon-thumbs-up"," typ-icon-thumbs-down"," typ-icon-tag"," typ-icon-views"," typ-icon-warning"," typ-icon-beta"," typ-icon-unlocked"," typ-icon-locked"," typ-icon-eject"," typ-icon-move"," typ-icon-expand"," typ-icon-cancel"," typ-icon-electricity"," typ-icon-compass"," typ-icon-location"," typ-icon-directions"," typ-icon-pin"," typ-icon-mute"," typ-icon-volume"," typ-icon-globe-2"," typ-icon-pencil-2"," typ-icon-minus"," typ-icon-equals"," typ-icon-list-2"," typ-icon-flag"," typ-icon-info"," typ-icon-question"," typ-icon-chat"," typ-icon-clock"," typ-icon-calendar"," typ-icon-sun"," typ-icon-contrast"," typ-icon-mobile"," typ-icon-download"," typ-icon-puzzle"," typ-icon-music"," typ-icon-scissors"," typ-icon-bookmark"," typ-icon-anchor"," typ-icon-checkmark"," wpzoom-facebook"," wpzoom-twitter-old"," wpzoom-share"," wpzoom-feed"," wpzoom-bird"," wpzoom-chat"," wpzoom-envelope"," wpzoom-envelope-2"," wpzoom-phone"," wpzoom-phone-2"," wpzoom-phone-3"," wpzoom-mobile"," wpzoom-ipod"," wpzoom-monitor"," wpzoom-laptop"," wpzoom-modem"," wpzoom-speaker"," wpzoom-window"," wpzoom-server"," wpzoom-hdd"," wpzoom-keyboard"," wpzoom-mouse"," wpzoom-cd"," wpzoom-floppy"," wpzoom-hardware"," wpzoom-usb"," wpzoom-cord"," wpzoom-socket"," wpzoom-socket-2"," wpzoom-socket-3"," wpzoom-printer"," wpzoom-camera"," wpzoom-pictures"," wpzoom-eye"," wpzoom-untitled"," wpzoom-film"," wpzoom-camera-2"," wpzoom-movie"," wpzoom-tv"," wpzoom-camera-3"," wpzoom-camera-4"," wpzoom-volume"," wpzoom-music"," wpzoom-microphone"," wpzoom-radio"," wpzoom-ipod-2"," wpzoom-headphone"," wpzoom-cassette"," wpzoom-broadcast"," wpzoom-broadcast-2"," wpzoom-calculator"," wpzoom-gamepad"," wpzoom-gamepad-2"," wpzoom-cog"," wpzoom-shield"," wpzoom-skull"," wpzoom-bug"," wpzoom-mine"," wpzoom-earth"," wpzoom-globe"," wpzoom-planet"," wpzoom-battery"," wpzoom-battery-low"," wpzoom-battery-2"," wpzoom-battery-full"," wpzoom-folder"," wpzoom-search"," wpzoom-zoom-out"," wpzoom-zoom-in"," wpzoom-binocular"," wpzoom-location"," wpzoom-pin"," wpzoom-file"," wpzoom-tag"," wpzoom-quote"," wpzoom-attachment"," wpzoom-bookmark"," wpzoom-bookmark-2"," wpzoom-newspaper"," wpzoom-notebook"," wpzoom-address-book"," wpzoom-clipboard"," wpzoom-clipboard-2"," wpzoom-board"," wpzoom-pencil"," wpzoom-pen"," wpzoom-user"," wpzoom-user-2"," wpzoom-user-3"," wpzoom-trashcan"," wpzoom-cart"," wpzoom-bag"," wpzoom-suitcase"," wpzoom-card"," wpzoom-book"," wpzoom-gift"," wpzoom-lamp"," wpzoom-settings"," wpzoom-support"," wpzoom-medicine"," wpzoom-cone"," wpzoom-locked"," wpzoom-unlocked"," wpzoom-key"," wpzoom-info"," wpzoom-clock"," wpzoom-timer"," wpzoom-food"," wpzoom-drink"," wpzoom-mug"," wpzoom-cup"," wpzoom-drink-2"," wpzoom-mug-2"," wpzoom-lollipop"," wpzoom-lab"," wpzoom-puzzle"," wpzoom-flag"," wpzoom-star"," wpzoom-heart"," wpzoom-badge"," wpzoom-cup-2"," wpzoom-scissors"," wpzoom-snowflake"," wpzoom-cloud"," wpzoom-lightning"," wpzoom-night"," wpzoom-sunny"," wpzoom-droplet"," wpzoom-umbrella"," wpzoom-truck"," wpzoom-car"," wpzoom-gas-pump"," wpzoom-factory"," wpzoom-tree"," wpzoom-leaf"," wpzoom-flower"," wpzoom-direction"," wpzoom-thumbs-up"," wpzoom-thumbs-down"," wpzoom-pointer"," wpzoom-pointer-2"," wpzoom-pointer-3"," wpzoom-pointer-4"," wpzoom-arrow-up"," wpzoom-arrow-down"," wpzoom-arrow-left"," wpzoom-arrow-right"," wpzoom-arrow-top-right"," wpzoom-arrow-top-left"," wpzoom-arrow-bottom-right"," wpzoom-arrow-bottom-left"," wpzoom-contract"," wpzoom-enlarge"," wpzoom-refresh"," eco-download"," eco-chat"," eco-archive"," eco-user"," eco-users"," eco-archive-2"," eco-earth"," eco-location"," eco-contract"," eco-mobile"," eco-screen"," eco-mail"," eco-support"," eco-help"," eco-videos"," eco-pictures"," eco-link"," eco-search"," eco-cog"," eco-trashcan"," eco-pencil"," eco-info"," eco-article"," eco-clock"," eco-photoshop"," eco-illustrator"," eco-star"," eco-heart"," eco-bookmark"," eco-file"," eco-feed"," eco-locked"," eco-unlocked"," eco-refresh"," eco-list"," eco-share"," eco-archive-3"," eco-images"," eco-images-2"," eco-pencil-2");
	
	sort($icone);
	// ! END ICONE

    $original_title = '';
    if ( 'taxonomy' == $item->type ) {
        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
        if ( is_wp_error( $original_title ) )
            $original_title = false;
    } elseif ( 'post_type' == $item->type ) {
        $original_object = get_post( $item->object_id );
        $original_title = $original_object->post_title;
    }

    $classes = array(
        'menu-item menu-item-depth-' . $depth,
        'menu-item-' . esc_attr( $item->object ),
        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
    );

    $title = $item->title;

    if ( ! empty( $item->_invalid ) ) {
        $classes[] = 'menu-item-invalid';
        /* translators: %s: title of menu item which is invalid */
        $title = sprintf( __( '%s (Invalid)' ), $item->title );
    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
        $classes[] = 'pending';
        /* translators: %s: title of menu item in draft status */
        $title = sprintf( __('%s (Pending)'), $item->title );
    }

    $title = empty( $item->label ) ? $title : $item->label;

    ?>
    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
        <dl class="menu-item-bar">
            <dt class="menu-item-handle">
                <span class="item-title"><span class="icon16 <?=$item->icon?>" id="icona-<?=$item_id?>"></span> <?php echo esc_html( $title ); ?></span>
                <span class="item-controls">
                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-up-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-down-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                    ?>"><?php _e( 'Edit Menu Item' ); ?></a>
                </span>
            </dt>
        </dl>

        <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
            <?php if( 'custom' == $item->type ) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                        <?php _e( 'URL' ); ?><br />
                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                    </label>
                </p>
            <?php endif; ?>
            <p class="description description-thin">
                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                    <?php _e( 'Navigation Label' ); ?><br />
                    <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                </label>
            </p>
            <p class="description description-thin">
                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                    <?php _e( 'Title Attribute' ); ?><br />
                    <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                </label>
            </p>
            <p class="field-link-target description">
                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                    <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                    <?php _e( 'Open link in a new window/tab' ); ?>
                </label>
            </p>
            <p class="field-css-classes description description-thin">
                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                    <?php _e( 'CSS Classes (optional)' ); ?><br />
                    <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                </label>
            </p>
            <p class="field-xfn description description-thin">
                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                    <?php _e( 'Link Relationship (XFN)' ); ?><br />
                    <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                </label>
            </p>
            <p class="field-description description description-wide">
                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                    <?php _e( 'Description' ); ?><br />
                    <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                </label>
            </p>        
            <?php
            /*
             * This is the added field
             */
            ?>      
            <p class="field-custom description description-wide">
                <label for="edit-menu-item-label-<?php echo $item_id; ?>">
                    <?php _e( 'Label' ); ?><br />
                    <input type="text" id="edit-menu-item-label-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-label[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->label ); ?>" />
                </label>
            </p>
            <p class="field-custom description description-wide">
                <label for="edit-menu-item-stat-<?php echo $item_id; ?>">
                    <?php _e( 'Statistica' ); ?><br />
                    <select id="edit-menu-item-stat-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-stat[<?php echo $item_id; ?>]">
	                    <?php foreach( $stat_functions as $stat ): ?>
	                    <option value="<?=$stat['func']?>" <?php if( $stat['func'] == esc_attr( $item->stat ) ): ?>selected<?php endif; ?>><?=$stat['label']?></option>
	                    <?php endforeach; ?>
                    </select>
                </label>
            </p>
            <p class="field-custom description description-wide">
                <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
                    <?php _e( 'Icona' ); ?><br />
                    <select onchange="jQuery('#icona-<?=$item_id?>').attr('class','icon16 '+this.value)" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-icon[<?php echo $item_id; ?>]">
	                    <?php foreach( $icone as $icona ): ?>
	                    <option value="<?=$icona?>" <?php if( $icona == esc_attr( $item->icon ) ): ?>selected<?php endif; ?>><?=$icona?></option>
	                    <?php endforeach; ?>
                    </select>
                </label>
            </p>
            <?php
            /*
             * end added field
             */
            ?>
            <div class="menu-item-actions description-wide submitbox">
                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                    <p class="link-to-original">
                        <?php printf( __('Original: %s'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                    </p>
                <?php endif; ?>
                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                echo wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'delete-menu-item',
                            'menu-item' => $item_id,
                        ),
                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                    ),
                    'delete-menu_item_' . $item_id
                ); ?>"><?php _e('Remove'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
            </div>

            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
        </div><!-- .menu-item-settings-->
        <ul class="menu-item-transport"></ul>
    <?php
    $output .= ob_get_clean();
    }
}


class Gestionale_Sidebar_Walker extends Walker_Nav_Menu {  
  
    function start_lvl(&$output, $depth=0, $args=array()) {  
        if( isset($depth) ):
	        $output .= "\n<ul class='sub'>\n";
	    else:
		    $output .= "\<ul>\n";
	    endif;
    }  
  
    function start_el(&$output, $item, $depth=0, $args=array()) {  
        $output .= "<li><a href='".$item->url."'>";
        if($item->icon) $output .= "<span class='icon16 ".$item->icon."'></span> ";
        $output .= esc_attr($item->title);
        if($item->label) $output .= '<span class="notification">'.$item->label.'</span>';
        if($item->stat):
	        $stat = call_user_func( $item->stat );
	        if($stat != 0) $output .= '<span class="notification red">'.$stat.'</span>';
	    endif;
        $output .= "</a>";
    }  
  

}

class Gestionale_Header_Walker extends Walker_Nav_Menu {  
  
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
    {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    
    function start_lvl(&$output, $depth=0, $args=array()) {  
        if( isset($depth) ):
	        $output .= "\n<ul class='dropdown-menu'>\n";
	    else:
		    $output .= "\<ul>\n";
	    endif;
    }
  
    function start_el(&$output, $item, $depth=0, $args=array()) {  
        
        $output .= "<li class='";
	        if( $args->has_children ) $output .= 'dropdown ';
	        if( in_array("current_page_item",$item->classes) ) $output .= ' active';
	        if( $depth > 0 ) $output .= 'menu ';
	    $output .= "'><a href='".$item->url."'";
	        if( $args->has_children ) $output .= ' class="dropdown-toggle" data-toggle="dropdown"';
        $output .= ">";
        
        if($item->icon) $output .= "<span class='icon16 ".$item->icon."'></span> ";
        $output .= esc_attr($item->title);
        if($item->label) $output .= '<span class="notification">'.$item->label.'</span>';
        if($item->stat):
	        $stat = call_user_func( $item->stat );
	        if($stat != 0) $output .= '<span class="notification red">'.$stat.'</span>';
	    endif;
	    
	    if( $args->has_children ) $output .= '<b class="caret"></b>';
        
        $output .= "</a>";
    }

}

?>