<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 16.06.17
 * Time: 23:19
 */

namespace xbuw\framework\Database;

interface DatabaseContract
{
    /**
     * Must execute query on database
     * @param $statement
     * @return mixed
     */
    public function query($statement);
}