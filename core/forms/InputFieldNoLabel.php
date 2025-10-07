<?php

namespace framework\core\forms;

use framework\core\Model;

class InputFieldNoLabel extends BaseFieldNoLabel
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_HIDDEN = 'hidden';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';
    public const TYPE_DATE = 'date';
    public const TYPE_FILE = 'file';
    public const TYPE_TEL = 'tel';

    public string $type;
    public string $placeholder;


    public function __construct(Model $model, string $attribute, string $placeholder)
    {
        $this->type = 'text';
        $this->placeholder = $placeholder;
        parent::__construct($model, $attribute);
    }


    public function passwordField(): self
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }


    public function emailField(): self
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }


    public function telField(): self
    {
        $this->type = self::TYPE_TEL;
        return $this;
    }


    public function numberField(): self
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }


    public function hiddenField(): self
    {
        $this->type = self::TYPE_HIDDEN;
        return $this;
    }


    public function dateField(): self
    {
        $this->type = self::TYPE_DATE;
        return $this;
    }


    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" value="%s" class="form-control %s" placeholder="%s" />',
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute)?'is-invalid':'',
            $this->placeholder
        );
    }

}