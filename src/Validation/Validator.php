<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 14.06.17
 * Time: 12:19
 */

namespace xbuw\framework\Validation;


class Validator
{
    private $object;
    private $rules =[];
    private $errors =[];

    private static $known_rules =[
        'min' => 'xbuw\framework\Validation\Rules\MinValidationRule',
        'numeric' => 'xbuw\framework\Validation\Rules\NumericValidationRule'
    ];

    /*
     * ($request, ["title" => ["min:4", "numeric"]]);
     */
    public function __construct($object, array $rules)
    {
        $this->object = $object;
        $this->rules = $rules;
    }

    public function validate(): bool
    {
        $result = true;
        foreach ($this->rules as $field_name => $field_rules) {
            foreach ($field_rules as $field_rule) {
                $exploded_rule = explode(":", $field_rule);
                $rule_key = $exploded_rule[0];

                if(!array_key_exists($rule_key, self::$known_rules)){
                    //exception
                    continue;
                }

                $rule_params = [];
                if(count($exploded_rule) > 1){
                    $rule_params = explode(",", $exploded_rule[1]);
                }

                $validation_class = new self::$known_rules[$rule_key];

                $field_value = !isset($this->object->$field_name) ? $this->object->$field_name : null;

                if(!$validation_class->check($field_name,$field_value,$rule_params)){
                    $result = false;
                    $this->errors[$field_name."-".$field_rule] = $validation_class->getError(
                        $field_name, $field_value, $rule_params
                    );
                }
            }
        }
        return $result;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public static function addValidationRule(string $key, string $class_namespace): bool
    {
        if(class_exists($class_namespace)){
            self::$known_rules[$key] = $class_namespace;
            return true;
        }
        return false;
    }
}