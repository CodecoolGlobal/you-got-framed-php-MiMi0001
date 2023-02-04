<?php
namespace app\model;

interface UserQueryRepositoryInterface {
    static function getUserById(int $id): ?user;
    static function getAllUsers(): array;
    static function addNewUser($name, $email): int;
    static function updateUser($id, $columnName, $newValue);
    static function getUserColumnValue($id, $columnName);
}
