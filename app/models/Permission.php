<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class Permission extends DbModel
{
    public string $name = '';
    public string $description = '';

    public function tableName(): string
    {
        return 'permissions';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'description'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'description' => 'Description'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}