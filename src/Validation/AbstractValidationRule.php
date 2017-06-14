<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 14.06.17
 * Time: 12:16
 */

namespace xbuw\framework\Validation;


abstract class AbstractValidationRule
{
    abstract function check(string $field_name, $field_value, array $params): bool;

    public function getError(string $field_name, $field_value, array $params): string{
        return "$field_name - error";
    }
}