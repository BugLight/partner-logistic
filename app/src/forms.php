<?php
namespace Forms;

class Field {
    public $name;
    public $validator;
    public $required;

    function __construct($name, $required = false, callable $validator = NULL) {
        $this->name = $name;
        $this->validator = $validator;
        $this->required = $required;
    }

    function validate($value) {
        if (!is_callable($this->validator))
            return true;
        $validator = $this->validator;
        return $validator($value);
    }
}

class Form {
    public $fields;
    public $data = [];

    function __construct($fields, $data) {
        $this->fields = $fields;
        foreach ($fields as $field) {
            $name = $field->name;
            $val = $data[$name];
            if ($val)
                $this->data[$name] = $val;
        }
    }

    function validate() {
        $errors = [];
        foreach ($this->fields as $field) {
            $name = $field->name;
            $val = $this->data[$name];
            if ($val) {
                if ($field->validate($val))
                    $this->data[$name] = $val;
                else
                    $errors[] = $name;
            }
            elseif ($field->required) {
                $errors[] = $name;
            }
        }
        return $errors;
    }
}
?>
