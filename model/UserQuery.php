<?php

namespace app\model;

use app\model\UserQueryRepository as Queries;

class UserQuery implements QueryResultInterface
{
    private int $id;

    public function selectById(int $id): bool
    {
        $user = Queries::getUserById($id);
        if ($user !== null) {
            $id = $user . getId();
            return true;
        }
        return false;
    }

    public function set(string $property, $value)
    {
        Queries::updateUser($this->id, $property, $value);
    }

    public function get(string $property)
    {
        return Queries::getUserColumnValue($this->id, $property);
    }

    public function has(string $property): bool
    {
        $result = Queries::getUserColumnValue($this->id, $property);
        return ($result !== null);
    }

    public static function setST(int $id, string $property, $value)
    {
        Queries::updateUser($id, $property, $value);
    }

    public static function getST(int $id, string $property)
    {
        return Queries::getUserColumnValue($id, $property);
    }

    public static function hasST(int $id, string $property): bool
    {
        $result = Queries::getUserColumnValue($id, $property);
        return ($result !== null);
    }
}
