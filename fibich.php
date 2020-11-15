<?php

  /**
   * Plugin Name: Fibich Law Firm Custom Code
   * Description: Custom plugin to add custom functionalities based on client requests
   * Author: Paolo Gallardo | Waymaker Designs
   * Author URI: https:github.com/payatola2287
   * Version: 1.2
   */

use BisonPlugin\BisonPlugin;

require('class-bison.php');

$instance = new BisonPlugin();

$instance->do_update_checks();
