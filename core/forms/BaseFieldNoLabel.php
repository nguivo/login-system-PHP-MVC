<?php

namespace framework\core\forms;

use framework\core\Model;

abstract class BaseFieldNoLabel
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
                <div class="invalid-feedback" style="color: red">%s</div>
            </div>
        ',$this->renderInput(),
            $this->model->getFirstError($this->attribute)??''
        );
    }

}