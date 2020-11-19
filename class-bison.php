<?php

include('plugin-update-checker/plugin-update-checker.php');
include('inc/shortcodes.php');

class BisonPlugin
{
  public function __construct()
  {
    $s = new FibichShortcodes();
    add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts_styles']);
    add_action('wp_loaded', [$this, 'include_essentials']);
    add_shortcode('fibich_menu', [$s, 'fibich_menu_shortcode']);
  }

  public function include_essentials()
  {
    include 'inc/navs/wp_bisonnavwalker.inc.php';
  }

  public function enqueue_scripts_styles()
  {
    $scripts = [
      'fontawesome' => [
        'src' => 'https://kit.fontawesome.com/5e40b17809.js',
        'deps' => [],
        'version' => false,
        'footer' => false
      ],
      'splide' => [
        'src' => plugin_dir_url(__FILE__) . 'vendor/_splide/js/splide.min.js',
        'deps' => [],
        'version' => false,
        'footer' => false
      ]
    ];
    $styles = [
      'splide' => [
        'src' => plugin_dir_url(__FILE__) . 'vendor/_splide/css/splide.min.css',
        'deps' => [],
        'version' => false,
        'footer' => false
      ],
      'splide-core' => [
        'src' => plugin_dir_url(__FILE__) . 'vendor/_splide/css/splide-core.min.css',
        'deps' => [ 'splide' ],
        'version' => false,
        'footer' => false
      ],
      'fibichcustom' => [
        'src' => plugin_dir_url(__FILE__) . 'css/site.css',
        'deps' => [],
        'version' => false,
        'footer' => false
      ]
    ];
    foreach ($scripts as $scriptID => $script) {
      wp_enqueue_script($scriptID, $script['src'], $script['deps'], $script['version'], $script['footer']);
    }
    foreach ($styles as $stylesID => $style) {
      wp_enqueue_style($stylesID, $style['src'], $style['deps'], $style['version'], $style['footer']);
    }
  }
}
