<?php

namespace framework\core\forms;

use framework\core\Model;

class CheckRadioFields extends BaseRadioCheck
{
    public const TYPE_CHECK = "checkbox";
    public const TYPE_RADIO = "radio";

    public string $type;


    public function __construct(Model $model, string $attribute)
    {
        $this->type = 'checkbox';
        parent::__construct($model, $attribute);
    }


    public function checkboxField(): self
    {
        $this->type = self::TYPE_CHECK;
        return $this;
    }


    public function radioField(): self
    {
        $this->type = self::TYPE_RADIO;
        return $this;
    }


    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" id="%s" value="%s" class="%s" />',
            $this->type,
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute)?'is-invalid':'',
        );
    }
}