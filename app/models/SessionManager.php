<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class SessionManager extends DbModel
{
    public int $user_id = 0;
    public string $data = '';
    public string $last_activity = '';
    public string $ip = '';
    public string $user_agent = '';

    public function tableName(): string
    {
        return 'sessions';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'data', 'last_activity', 'ip', 'user_agent'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'data' => 'Data',
            'last_activity' => 'Last Activity',
            'ip' => 'IP',
            'user_agent' => 'User Agent',
        ];
    }

    public function rules(): array
    {
        return [];
    }
}