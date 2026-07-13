<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * Directory that holds Migrations and Seeds
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Default connection group
     */
    public string $defaultGroup = 'default';

    /**
     * Default Database Connection
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => '',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
    ];

    /**
     * Database for Testing
     */
    public array $tests = [
        'DSN'          => '',
        'hostname'     => '127.0.0.1',
        'username'     => '',
        'password'     => '',
        'database'     => ':memory:',
        'DBDriver'     => 'SQLite3',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'foreignKeys'  => true,
        'busyTimeout'  => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Load values from .env
        $this->default['hostname'] = env('database.default.hostname', 'localhost');
        $this->default['username'] = env('database.default.username', 'root');
        $this->default['password'] = env('database.default.password', '');
        $this->default['database'] = env('database.default.database', '');
        $this->default['DBDriver'] = env('database.default.DBDriver', 'MySQLi');
        $this->default['DBPrefix'] = env('database.default.DBPrefix', '');
        $this->default['port']     = (int) env('database.default.port', 3306);
        $this->default['charset']  = env('database.default.charset', 'utf8mb4');
        $this->default['DBCollat'] = env('database.default.DBCollat', 'utf8mb4_general_ci');

        $this->default['DBDebug'] = ENVIRONMENT !== 'production';

        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}