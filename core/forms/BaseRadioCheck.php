<?php

namespace framework\core\forms;

use framework\core\Model;

abstract class BaseRadioCheck
{
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;


    public function __toString(): string
    {
        return sprintf('
            <div class="form-group">
                %s
                <label for="%s">%s</label>
                <div class="invalid-feedback">%s</div>
            </div><br>
        ', $this->renderInput(),
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->model->getFirstError($this->attribute)??''
        );
    }

}