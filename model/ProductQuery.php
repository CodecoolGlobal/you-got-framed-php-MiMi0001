<?php

namespace app\model;

use app\model\ProductQueryRepository as Queries;

class ProductQuery implements QueryResultInterface
{
    private int $id;

    public function selectById(int $id): bool
    {
        $user = \app\model\UserQueryRepository::getUserById($id);
        if ($user !== null) {
            $id = $user . getId();
            return true;
        }
        return false;
    }

    public function set(string $property, $value)
    {
        Queries::updateProduct($this->id, $property, $value);
    }

    public function get(string $property)
    {
        return Queries::getProductColumnValue($this->id, $property);
    }

    public function has(string $property): bool
    {
        $result = Queries::getProductColumnValue($this->id, $property);
        return ($result !== null);
    }

    public static function setST(int $id, string $property, $value)
    {
        Queries::updateProduct($id, $property, $value);
    }

    public static function getST(int $id, string $property)
    {
        return Queries::getProductColumnValue($id, $property);
    }

    public static function hasST(int $id, string $property): bool
    {
        $result = Queries::getProductColumnValue($id, $property);
        return ($result !== null);
    }
}
