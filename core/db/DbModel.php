<?php

namespace framework\core\db;

use framework\app\models\User;
use framework\core\Application;
use framework\core\Model;

abstract class DbModel extends Model
{


    abstract public function tableName(): string;
    abstract public function primaryKey(): string;
    abstract public function attributes(): array;


    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $stm = self::prepare("INSERT INTO $tableName (".implode(',',$attributes).") 
                            VALUES(".implode(',',$params).")");

        foreach ($attributes as $attribute) {
            $stm->bindValue(":$attribute", $this->{$attribute});
        }

        //$stm->execute();
        //return Application::$app->db->pdo->lastInsertId();

        if($stm->execute()) {
            return true;
        }
        return false;
    }


    public function read($where = []): mixed
    {
        $tableName = $this->tableName();
        $prim_key = $this->primaryKey();
        $sql = "SELECT * FROM $tableName";

        if($where) {
            $sql .= " WHERE ";
            $condition = array_map(fn($attr) => "$attr = :$attr", array_keys($where));
            $sql .= implode(' AND ', $condition);
        }
        $sql .= " ORDER BY $prim_key DESC";
        $stm = self::prepare($sql);

        if($where) {
            foreach($where as $key => $value) {
                $stm->bindValue(":$key", $value);
            }
        }

        if($stm->execute()) {
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        }
        return false;
    }


    public function update(array $where): bool
    {
        //$primaryKey = $this->primaryKey();
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => "$attr = :$attr", $attributes);
        $whr = '';

        foreach($where as $key => $value) {
            $whr .= "$key = '$value'";

            if($key != array_key_last($where)) {
                $whr .= " AND ";
            }
        }

        $stm = self::prepare("UPDATE $tableName SET ".implode(',',$params)." WHERE $whr");
        //Application::dnd($stm);
        foreach ($attributes as $attribute) {
            $stm->bindValue(":$attribute", $this->{$attribute});
        }

        if($stm->execute()) {
            return true;
        }
        return false;
    }


    public function delete(array $where): bool
    {
        $tableName = $this->tableName();
        $params = array_map(fn($attr) => "$attr = :$attr", array_keys($where));
        $condition = implode(' AND ', $params);
        $stm = self::prepare("DELETE FROM $tableName WHERE $condition");

        foreach($where as $key => $value) {
            $stm->bindValue(":$key", $value);
        }

        if($stm->execute()) {
            return true;
        }
        return false;
    }


    public function recordCount($table = '', $where = []): int
    {
        $tableName = $table ?? $this->tableName();
        $sql = "SELECT COUNT(*) FROM $tableName";

        if($where) {
            $sql .= " WHERE ";
            $params = array_map(fn($attr) => "$attr = :$attr", array_keys($where));
            $sql .= implode(" AND ", $params);
        }

        $stm = self::prepare($sql);

        if($where) {
            foreach($where as $key => $value) {
                $stm->bindValue(":$key", $value);
            }
        }

        $result = $stm->execute();

        if($result) {
            return $result;
        }
        return 0;
    }


    public function findOne(array $where)
    {
        $tableName = $this->tableName();
        $prim_key = $this->primaryKey();
        $attributes = array_keys($where);

        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stm = self::prepare("SELECT * FROM $tableName WHERE $sql ORDER BY $prim_key DESC");

        foreach($where as $key => $item) {
            $stm->bindValue(":$key", $item);
        }
        $stm->execute();
        return $stm->fetchObject(static::class);
    }


    public static function prepare(string $sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
