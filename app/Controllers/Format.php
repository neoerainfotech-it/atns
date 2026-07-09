<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Format extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Available Formatters
     * --------------------------------------------------------------------------
     */
    public array $formatters = [
        'application/json' => \CodeIgniter\Format\JSONFormatter::class,
        'application/xml'  => \CodeIgniter\Format\XMLFormatter::class,
        'text/xml'         => \CodeIgniter\Format\XMLFormatter::class,
    ];

    /**
     * --------------------------------------------------------------------------
     * JSON Encoder Configuration Options
     * --------------------------------------------------------------------------
     */
    public int $jsonEncodeOptions = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
    public int $jsonEncodeDepth   = 512; 
}