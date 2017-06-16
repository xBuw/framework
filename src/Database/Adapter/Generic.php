<?php

namespace xbuw\framework\Database\Adapter;

use xbuw\framework\Database\DatabaseContract;

class Generic implements DatabaseContract
{
    private $connection;

    /**
     * Generic constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->connection = pg_connect("host=" . $config["host"] . " dbname=" . $config["dbname"] .
            " " . "user=" . $config["user"] . " password=" . $config["password"]);
    }

    /**
     * Execute some query on database
     * @param $statement
     * @return resource
     */
    public function query($statement)
    {
        $result = pg_query($this->connection, $statement);
        return $result;
    }

    /**
     * Insert line into table
     * @param string $table
     * @param array $array
     */
    public function insert(string $table, array $array)
    {
        pg_insert($this->connection, $table, $array);
    }
}