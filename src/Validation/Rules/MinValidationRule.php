<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 14.06.17
 * Time: 12:29
 */

namespace xbuw\framework\Validation\Rules;


use xbuw\framework\Validation\AbstractValidationRule;

class MinValidationRule extends AbstractValidationRule
{

    function check(string $field_name, $field_value, array $params): bool
    {
        return floatval($field_value) >= floatval($params[0]);
    }

    public function getError(string $field_name, $field_value, array $params): string
    {
        return "$field_name field must be greather than ".$params[0];
    }
}