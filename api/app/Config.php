<?php

namespace App;

/**
 * Class Config
 *
 * Configuration class for the application.
 *
 * @property-read array|null $db The database configuration array.
 */
class Config
{
    /**
     * @var array Configuration data.
     */
    protected $config = [];

    /**
     * Constructor.
     *
     * @param array $env Environment configuration.
     */
    public function __construct($env)
    {
        $this->config = [
            'db' => [
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_DATABASE'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
            ]
        ];
    }

    /**
     * @param string $name
     *
     * @return string|null
     */
    public function __get($name)
    {
        return $this->config[$name] ?? null;
    }
}
