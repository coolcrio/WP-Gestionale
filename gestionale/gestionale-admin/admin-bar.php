<?php

function gestionale_admin_bar() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'gestionale_admin_bar', 0);

class FacebookMenu {
  
  function FacebookMenu()
  {
      add_action( 'admin_bar_menu', array( $this, "facebook_links" ) );
  }

  /**
   * Add's new global menu, if $href is false menu is added but registred as submenuable
   *
   * $name String
   * $id String
   * $href Bool/String
   *
   * @return void
   * @author Janez Troha
   * @author Aaron Ware
   **/

  function add_root_menu($name, $id, $href = FALSE)
  {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $wp_admin_bar->add_menu( array(
        'id'   => $id,
        'meta' => array(),
        'title' => $name,
        'href' => $href ) );
  }

  /**
   * Add's new submenu where additinal $meta specifies class, id, target or onclick parameters
   *
   * $name String
   * $link String
   * $root_menu String
   * $id String
   * $meta Array
   *
   * @return void
   * @author Janez Troha
   **/
  function add_sub_menu($name, $link, $root_menu, $id, $meta = FALSE)
  {
      global $wp_admin_bar;
      if ( ! is_super_admin() || ! is_admin_bar_showing() )
          return;
    
      $wp_admin_bar->add_menu( array(
          'parent' => $root_menu,
          'id' => $id,
          'title' => $name,
          'href' => $link,
          'meta' => $meta
      ) );
  }

  function facebook_links() {
      $this->add_root_menu( "Facebook", "fcbl" );
      $this->add_sub_menu( "Facebook pages", "http://www.facebook.com/pages/manage", "fcbl", "fcblp" );
      $this->add_sub_menu( "Facebook apps", "http://www.facebook.com/developers/apps.php", "fcbl", "fcbla" );
      $this->add_sub_menu( "Facebook insights", "http://www.facebook.com/insights", "fcbl", "fcbli" );
  }

}

//add_action( "init", "FacebookMenuInit" );
function FacebookMenuInit() {
    global $FacebookMenu;
    $FacebookMenu = new FacebookMenu();
}