<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     * 🌟 FIXED AND FULLY ALIGNED WITH XAMPP & ATnaDAtAbAsE SQL SCHEMA
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'srv947.hstgr.io',
        'username'     => 'u957189082_atna_tech',              // Default XAMPP username
        'password'     => 'Atna@2026',                  // Default XAMPP password is empty
        'database'     => 'u957189082_atna_tech',      // Exact case-sensitive database name from your SQL file
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => 'cyb_',              // Automated prefix mapping handler for cyb_home_slider, etc.
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',           // Updated to modern standard matching your collation group
        'DBCollat'     => 'utf8mb4_general_ci',// Matches the collation criteria defined inside your SQL dump
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
    ];

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}