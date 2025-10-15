<?php

namespace framework\app\models;

use framework\core\db\DbModel;

/*
 * confirmation codes emailed to clients will be stored in the database
 * for verification
 * */
class ConfirmationModel extends DbModel
{

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
        return [];
    }

    public function rules(): array
    {
        return [];
    }
}