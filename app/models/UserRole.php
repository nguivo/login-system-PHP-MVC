<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class UserRole extends DbModel
{
    public int $user_id = 0;
    public int $role_id = 0;
    public int $assigned_by = 0;
    public string $assigned_at = '';
    public string $expires_ = '';

    public function tableName(): string
    {
        return 'user_roles';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'role_id', 'assigned_by', 'assigned_at', 'expires_at'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User id',
            'role_id' => 'Role Id',
            'assigned_by' => 'Assigned By',
            'assigned_at' => 'Assigned At',
            'expires_at' => 'Expires at'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}