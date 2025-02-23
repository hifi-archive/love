<?php
/**
 * Unit test bootstrapping
 *
 * @category   LoveMachine
 * @package    UnitTests
 * @author     LoveMachine Inc. <all@lovemachineinc.com>
 * @license    Copyright (c) 2009-2010, LoveMachine Inc. All Rights Reserved
 * @version    SVN: $Id: bootstrap.php 105 2010-10-10 21:45:37Z yani $
 * @link       http://www.lovemachineinc.com
 */
require_once 'PHPUnit/Framework.php';

if (!defined('TESTS_BASE_DIR')) {
    define('TESTS_BASE_DIR', dirname(__FILE__));
}
if (!defined('TESTS_DIR')) {
    define('TESTS_DIR', TESTS_BASE_DIR . '/Tests');
}
if (!defined('TESTS_LIB_DIR')) {
    $libDir = realpath(TESTS_BASE_DIR . '/../lib');
    if (!file_exists($libDir) || !is_dir($libDir)) {
        die('Bootstrapping failed. Could not determine lib dir.');
    }
    define('TESTS_LIB_DIR', $libDir);
    unset($libDir);
}
if (!defined('TESTS_APP_DIR')) {
    $appDir = realpath(TESTS_BASE_DIR . '/../application');
    if (!file_exists($appDir) || !is_dir($appDir)) {
        die('Bootstrapping failed. Could not determine app dir.');
    }
    define('TESTS_APP_DIR', $appDir);
    unset($appDir);
}
$loadLib = TESTS_LIB_DIR . '/loadlib.php';
require_once $loadLib;
unset($loadLib);
$loadApp = TESTS_APP_DIR . '/loadapp.php';
require_once $loadApp;
unset($loadApp);

PHPUnit_Util_Filter::addFileToFilter(__FILE__);
PHPUnit_Util_Filter::addDirectoryToFilter(TESTS_DIR);
PHPUnit_Util_Filter::addDirectoryToWhitelist(TESTS_LIB_DIR);
PHPUnit_Util_Filter::addDirectoryToWhitelist(TESTS_APP_DIR);

// config
if (file_exists(TESTS_BASE_DIR . '/config.php')) {
    require_once TESTS_BASE_DIR . '/config.php';
} else {
    require_once TESTS_BASE_DIR . '/config.dist.php';
}