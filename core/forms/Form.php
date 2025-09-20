<?php

namespace framework\core\forms;

use framework\core\Model;

class Form
{

    public static function begin($action = '', $method = 'post'): self
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }


    public function field(Model $model, string $attribute, $placeholder = ''): InputField
    {
        return new InputField($model, $attribute, $placeholder);
    }


    public function fieldNoLabel(Model $model, string $attribute, $placeholder = ''): string
    {
        $element = new InputField($model, $attribute, $placeholder);
        return $element->noLabel();
    }


    public function specialFields(Model $model, string $attribute): CheckRadioFields
    {
        return new CheckRadioFields($model, $attribute);
    }


    public static function end(): void
    {
        echo '</form>';
    }

}
