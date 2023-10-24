<?php

namespace App;

use App\Exceptions\RouterException;

class App
{
    protected Router $router;

    protected array $request;

    private static Database $databaseConnection;

    public function __construct(Router $router, array $request, Config $config)
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
