<?php
namespace app\model;

interface QueryResultInterface{
    public function selectById(int $id): boolean;

    public function set(string $property, $value);

    public function get(string $property);

    public function has(string $property);
}
