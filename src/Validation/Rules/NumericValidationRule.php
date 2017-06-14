<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 14.06.17
 * Time: 12:29
 */

namespace xbuw\framework\Validation\Rules;


use xbuw\framework\Validation\AbstractValidationRule;

class NumericValidationRule extends AbstractValidationRule
{

    function check(string $field_name, $field_value, array $params): bool
    {
        return is_numeric($field_value);
    }

    public function getError(string $field_name, $field_value, array $params): string
    {
        return "$field_name field must be numeric";
    }
}