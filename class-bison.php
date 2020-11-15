<?php
namespace BisonPlugin;

include('plugin-update-checker/plugin-update-checker.php');

use Puc_v4_Factory;

class BisonPlugin
{
  public function __construct()
  {
    add_action( 'wp_enqueue_scripts',[$this, 'enqueue_scripts_styles'] );
    add_action('wp_loaded', [$this, 'include_essentials']);
  }

  public function include_essentials()
  {
    include 'inc/navs/wp_bisonnavwalker.inc.php';
  }

  public function enqueue_scripts_styles(){
    $scripts = [
      'fontawesome' => [
        'src' => 'https://kit.fontawesome.com/5e40b17809.js',
        'deps' => [],
        'version' => false,
        'footer' => false
      ]
    ];
    foreach( $scripts as $scriptID => $script ){
      wp_enqueue_script( $scriptID, $script['src'], $script['deps'], $script['version'], $script['footer'] );
    }
  }

  public function do_update_checks( $dir ){
    $pluginUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
      'https://github.com/payatola2287/fibichlawfirmcustomcode/',
      $dir,
	    'fibichlawfirmcustomcode'
    );
    $pluginUpdateChecker->setBranch('production');
  }
}
