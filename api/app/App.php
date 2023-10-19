<?php

namespace App;

use App\Exceptions\RouterException;
use App\Helpers\Debug;

/**
 * The main application class.
 */
class App
{
    /**
     * The router instance.
     *
     * @var Router $router
     */
    protected $router;

    /**
     * The request data.
     *
     * @var array $request
     */
    protected $request;

    /**
     * The database connection.
     *
     * @var Database
     */
    private static $databaseConnection;

    /**
     * Constructor.
     *
     * @param Router $router The router instance.
     * @param array $request The request data.
     * @param Config $config The configuration.
     */
    public function __construct($router, $request, $config)
    {
        $this->router = $router;
        $this->request = $request;
        static::$databaseConnection = new Database($config->db ?? []);
    }

    /**
     * Get the database connection.
     *
     * @return Database The database connection.
     */
    public static function database()
    {
        return static::$databaseConnection;
    }

    /**
     * Start the application.
     */
    public function up()
    {
        try {
            echo $this->router->resolve(
                $this->request['method'],
                $this->request['uri']
            );
        } catch (RouterException $exception) {
            $routeArgs = $exception->getTrace()[1]['args'];
            throw RouterException::routeNotResolved($routeArgs);
        }
    }
}
