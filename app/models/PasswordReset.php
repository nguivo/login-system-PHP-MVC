<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class PasswordReset extends DbModel
{
    public int $user_id = 0;
    public string $selector = '';
    public string $token_hash = '';
    public string $expires_at = '';
    public string $created_at = '';

    public function tableName(): string
    {
        return 'password_resets';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'selector', 'token_hash', 'expires_at', 'created_at'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User',
            'selector' => 'Selector',
            'token_hash' => 'Password',
            'expires_at' => 'Expires At',
            'created_at' => 'Created At'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}