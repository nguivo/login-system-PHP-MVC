<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class FailedLogin extends DbModel
{
    public int $user_id = 0;
    public string $ip = '';
    public string $last_attempt;
    public string $locked_until = '';

    public function tableName(): string
    {
        return 'failed_logins';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'ip', 'attempts', 'last_attempt', 'locked_until'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'ip' => 'IP',
            'attempts' => 'Attempts',
            'last_attempt' => 'Last Attempt',
            'locked_until' => 'Locked Until'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}