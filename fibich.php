<?php

  /**
   * Plugin Name: Fibich Law Firm Custom Code
   * Description: Custom plugin to add custom functionalities based on client requests
   * Author: Paolo Gallardo | Waymaker Designs
   * Author URI: https:github.com/payatola2287
   * Version: 2.2
   */

use BisonPlugin\BisonPlugin;

require('class-bison.php');
include('plugin-update-checker/plugin-update-checker.php');
$instance = new BisonPlugin();

$pluginUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/payatola2287/fibichlawfirmcustomcode/',
  $dir,
  'fibichlawfirmcustomcode'
);
$pluginUpdateChecker->setBranch('production');
