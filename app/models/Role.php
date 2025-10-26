<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class Role extends DbModel
{
    public int $id = 0;
    public string $name = '';
    public string $description = '';
    public string $created_at = '';

    public function tableName(): string
    {
        return 'roles';
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
            'description' => 'Description',
        ];
    }

    public function rules(): array
    {
        return [];
    }
}