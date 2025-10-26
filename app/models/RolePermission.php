<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class RolePermission extends DbModel
{
    public int $id;
    public int $role_id;
    public int $permission_id;


    public function tableName(): string
    {
        return 'role_permissions';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['role_id', 'permission_id'];
    }

    public function labels(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }
}