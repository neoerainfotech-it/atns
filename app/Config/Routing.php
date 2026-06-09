<?php

namespace Config;

use CodeIgniter\Config\Routing as BaseRouting;

/**
 * Routing Configuration Options
 *
 * Maps structural parameters used by CodeIgniter 4.7+ to initialize
 * the engine's main route resolution pipelines cleanly.
 */
class Routing extends BaseRouting
{
    /**
     * The default namespace to be added to any Controllers.
     */
    public string $defaultNamespace = 'App\Controllers';

    /**
     * The name of the default controller to use.
     */
    public string $defaultController = 'Frontend';

    /**
     * The name of the default method to use.
     */
    public string $defaultMethod = 'index';

    /**
     * Whether to convert dashes to underscores in URI routing paths.
     */
    public bool $translateURIDashes = false;

    /**
     * A callable closure or route string shown when a route cannot be matched.
     */
    public ?string $override404 = null;

    /**
     * Auto Route settings (Legacy) configuration overrides.
     * Kept safe and isolated to prevent unexpected vulnerability bypasses.
     */
    public bool $autoRoute = false;

    /**
     * Array of paths pointing to files containing custom route definitions.
     */
    public array $routeFiles = [
        APPPATH . 'Config/Routes.php',
    ];

    /**
     * Sets whether to prioritize specific routes over others.
     */
    public bool $prioritize = false;
}