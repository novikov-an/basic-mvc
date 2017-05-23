<?php

/**copyright**/
class Connection
{

    /**
     * @return PDO
     */
    public static function make($config)
    {
        try {
            return new PDO(
                $config['type'] . ':host=' . $config['host'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die('Could not connect');
        }
    }

}