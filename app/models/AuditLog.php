<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class AuditLog extends DbModel
{
    public int $user_id = 0;
    public int $actor_id = 0;
    public string $action = '';
    public string $target_type = '';
    public int $target_id = 0;
    public string $meta = '';
    public string $ip = '';
    public string $user_agent = '';
    public string $created_at = '';

    public function tableName(): string
    {
        return 'audit_logs';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'actor_id', 'action', 'target_type', 'target_id', 'meta', 'ip', 'user_agent', 'created_at'];
    }

    public function labels(): array
    {
        return[
            'user_id' => 'User ID',
            'actor_id' => 'Done by',
            'action' => 'Action',
            'target_type' => 'Target Type',
            'target_id' => 'Target Id',
            'meta' => 'Meta Data',
            'ip' => 'IP Address',
            'user_agent' => 'User Agent',
            'create_at' => 'Date Created'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}