<?php

declare(strict_types = 1);

namespace App;

use PDO;

/**
 * @mixin PDO
 */
class Database
{
    private PDO $connection;

    public function __construct(array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO(
                "mysql:host={$config['host']};dbname={$config['database']}",
                $config['username'],
                $config['password'],
                $config['options'] ?? $defaultOptions
            );
        } catch (\PDOException $error) {
            echo '<pre>';
            echo $error;
            echo '</pre>';
            echo "<br/><br/>Connection failed: " . $error->getMessage();
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }
}
