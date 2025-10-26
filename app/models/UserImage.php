<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class UserImage extends DbModel
{
    public int $user_id = 0;
    public string $image_path = '';
    public string $alt_text = '';
    public string $is_primary = '';
    public string $sort_order = '';


    public function tableName(): string
    {
        return 'user_images';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'image_path', 'alt_text', 'is_primary', 'sort_order'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'image_path' => 'Image Path',
            'alt_text' => 'Alt Text',
            'is_primary' => 'Is Primary',
            'sort_order' => 'Sort Order',
        ];
    }

    public function rules(): array
    {
        return [];
    }
}