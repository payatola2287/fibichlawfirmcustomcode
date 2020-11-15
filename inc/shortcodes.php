<?php


class FibichShortcodes{
  public function __construct()
  {
    
  }

  public function fibich_menu_shortcode( $atts ){
    $atts = shortcode_atts( [ 
      'menu' => 'Primary'
     ], $atts );
    $menu_class = [ 
      'bison-menu'
     ];
     if( $atts['classes'] !== null && is_array( $atts[ 'classes' ] ) ){ // expecting ARRAY
      $menu_class = array_merge( $menu_class, $atts['classes'] );
     }elseif( $atts['classes'] !== null && !is_array( $atts['classes'] ) ){ // expecting STRING 
      $menu_class[] = $atts['classes'];
     }
    $classes = join( ' ', $menu_class );
    ob_start();
    wp_nav_menu( [
      'menu' => $atts['menu'],
      'walker' => new BisonNavWalker(),
      'menu_class' => $classes
    ] );
    return ob_get_clean();
  }
}