<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 11:43
 */

namespace xbuw\framework\Router;


class Router
{

    const DEFAULT_REGEXP = "[^\/]+";
    private $routes = [];

    /**
     * Router constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        foreach ($config as $key => $value) {
            $existed_variables = $this->getExistedVariables($value);
            $this->routes[$key] = [
                "method" => isset($value["method"]) ? $value["method"] : "GET",
                "controller_name" => explode('@', $value["action"], 2)[0],
                "controller_method" => explode('@', $value["action"], 2)[1],
                "regexp" => $this->getRegexpFromRoute($value, $existed_variables),
                "variables" => $existed_variables
            ];
        }
        echo '<pre>';
        print_r($this->routes);
        echo '</pre>';
    }

    /**
     * Return all variables
     *
     * @param array $config
     * @return array
     */
    private function getExistedVariables(array $config): array
    {
        preg_match_all("/{.+}/U", $config["pattern"], $variables);
        return $variables[0];
    }

    /**
     * Create final regexp for config
     *
     * @param array $config_route
     * @param array $existed_variables
     * @return string
     */
    private function getRegexpFromRoute(array $config_route, array $existed_variables): string
    {
        $pattern = $config_route["pattern"];
        $result = str_replace("/", "\/", $pattern);

        for ($i = 0; $i < count($existed_variables); $i++) {

            $currentVariable = substr($existed_variables[$i], 1, strlen($existed_variables[$i]) - 2);
            if (array_key_exists($currentVariable, $config_route["variables"])) {
                $var_reg = "(" . $config_route["variables"][$currentVariable] . ")";
            } else {
                $var_reg = "(" . self::DEFAULT_REGEXP . ")";
            }

            $result = str_replace($existed_variables[$i], $var_reg, $result);
        }

        return "^" . $result . "$";

    }
}