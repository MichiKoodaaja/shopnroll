<?php

class DB
{
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );

            // Määritä tietokannan asetukset täällä
            $dsn = 'mysql:host=localhost;dbname=mhopkins;charset=utf8';
$username = getenv('DB_USERNAME'); // Käyttää getenv() saadakseen ympäristömuuttujan
$password = getenv('DB_PASSWORD'); // Käyttää getenv() saadakseen ympäristömuuttujan


            self::$instance = new PDO($dsn, $username, $password, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
