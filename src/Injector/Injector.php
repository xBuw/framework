<?php

namespace xbuw\framework\Injector;

class Injector
{

    private static $config = [];

    /**
     * Set config
     * @param $config
     */
    public static function setConfig($config)
    {
        self::$config = $config;
    }

    /**
     * Simple DI
     * Only construct with parameters
     * @param $class_name
     * @param $params
     * @return object
     * @throws \Exception
     */
    public static function make($class_name, $params = [])
    {
        try {
            $reflectionClass = new \ReflectionClass(self::$config[$class_name]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        $reflectionMethod = $reflectionClass->getConstructor();
        $rParams = $reflectionMethod->getParameters();
        $rArgs = [];

        for ($i = 0; $i < count($rParams); $i++) {
            $rType = $rParams[$i]->getType();
            foreach (self::$config as $key => $value) {
                if ($key == $rType) {
                    $temp = new \ReflectionClass($value);
                    try {
                        $rArgs[$i] = $temp->newInstance();
                    } catch (\Exception $e) {
                        throw new \Exception($e->getMessage());
                    }
                }
            }
        }
        return $reflectionClass->newInstance(array_merge($params, $rArgs));
    }
}