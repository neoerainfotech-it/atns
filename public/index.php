<?php

// Check PHP version requirement.
if (version_compare(PHP_VERSION, '8.1', '<')) {
    exit(sprintf('Your PHP version must be 8.1 or higher to run CodeIgniter. Current version: %s', PHP_VERSION));
}

// 1. Path to the front controller directory (this directory)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// 2. Ensure the current directory is pointed to the front controller's directory
if (getcwd() !== __DIR__) {
    chdir(__DIR__);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE FRAMEWORK
 *---------------------------------------------------------------
 * The boot file initializes the framework core components and
 * schedules the request execution lifecycles cleanly.
 */

// 3. Load our paths config file
// Move up one directory out of 'public' to find the 'app' directory config
$pathsConfig = realpath(FCPATH . '../app/Config/Paths.php') ?: FCPATH . '../app/Config/Paths.php';
require_once $pathsConfig;

$paths = new Config\Paths();

// 4. LOAD THE FRAMEWORK BOOTSTRAP KERNEL FILE
// 🌟 FIXED: Replaced legacy bootstrap.php lookup with the modern 4.5+ Boot.php handler
require $paths->systemDirectory . '/Boot.php';

// 5. Launch the web environment kernel cleanly
exit(CodeIgniter\Boot::bootWeb($paths));