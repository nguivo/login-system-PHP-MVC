<?php

namespace framework\app\models;

use framework\core\db\DbModel;
use framework\core\Token;

/*
 * confirmation codes emailed to clients will be stored in the database
 * for verification
 * */
class Confirmation extends DbModel
{
    public int $user_id = 0;
    public string $operation = '';
    public string $token = '';
    public string $created_at = '';


    public function __construct() {
        $this->token = Token::generate();
        $this->created_at = date('Y-m-d H:i:s');
    }


    public function tableName(): string
    {
        return 'confirmations';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'operation', 'token', 'created_at'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'operation' => 'Operation',
            'token' => 'Token',
            'created_at' => 'Created At',
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public function saveConfirmation(): bool
    {
        return $this->save();
    }


}