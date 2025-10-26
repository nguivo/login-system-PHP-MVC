<?php

namespace framework\app\models;

use framework\core\db\DbModel;

class UserProfile extends DbModel
{
    public int $user_id;
    public string $first_name = '';
    public string $last_name = '';
    public int $image_id = 0;
    public string $bio = '';
    public string $address = '';
    public string $city = '';
    public string $country = '';
    public string $postal_code = '';
    public string $dob = '';

    public function tableName(): string
    {
        return 'user_profiles';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['user_id', 'first_name', 'last_name', 'image_id', 'bio', 'address', 'city', 'country', 'postal_code', 'dob'];
    }

    public function labels(): array
    {
        return [
            'user_id' => 'User Id',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'image_id' => 'Image Id',
            'bio' => 'Biography',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'postal_code' => 'Postal Code',
            'dob' => 'Date of Birth'
        ];
    }

    public function rules(): array
    {
        return [];
    }
}