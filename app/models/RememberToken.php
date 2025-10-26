<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class RememberToken extends DbModel
{
    public int $user_id = 0;
    public string $selector = '';
    public string $token_hash = '';
    public string $user_agent = '';
    public string $ip = '';
    public string $expires_at = '';
    public string $created_at = '';
    public string $last_used = '';


    public function tableName(): string
    {
        return 'remember_tokens';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'selector', 'token_hash', 'user_agent', 'ip', 'expires_at', 'created_at', 'last_used'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'selector' => 'Selector',
            'token_hash' => 'Token Hash',
            'user_agent' => 'User Agent',
            'ip' => 'IP Address',
            'expires_at' => 'Expires At',
            'created_at' => 'Created At',
            'last_used' => 'Last Used'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}