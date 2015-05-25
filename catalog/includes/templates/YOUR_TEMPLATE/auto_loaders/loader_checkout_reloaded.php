<?php
/*
 * 
 * @package checkout_reloaded
 * @copyright Copyright 2003-2015 ZenCart.Codes a Pro-Webs Company
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @filename checkout_reloaded.php
 * @file created 2015-01-17 12:42:23 AM
 * 
 */

$loaders[] = array(
    'conditions' => array(
        'pages' => array('checkout_reloaded') 
    ),
    'jscript_files' => array(
        '//code.jquery.com/jquery-1.11.3.min.js' => 1,
        'jquery/jquery_checkout_reloaded.php' => 4
    ),
    'css_files' => array(
        'checkout_reloaded.css' => 2,
    )
);
