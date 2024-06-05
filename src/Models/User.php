<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class User
{
    private PDO $conn;
    private $tableName = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function show($userId): array|bool
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data, $newPassword = null): bool
    {
        $query = "UPDATE " . $this->tableName . " SET name = :name, email = :email WHERE id = :id";

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":id", $id);

        try {
            $this->conn->beginTransaction();

            $stmt->execute();
            if ($newPassword) {
                $this->updatePassword($id, $newPassword);
            }

            $this->conn->commit();

            return true;
        } catch (\Throwable $th) {
            $this->conn->rollBack();

            return false;
        }
    }

    public function updatePassword($id, $newPassword): bool
    {
        $password = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE " . $this->tableName . " SET password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password): array|bool
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function register($data): bool
    {
        $tableName = $this->tableName;
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $query = "INSERT INTO {$tableName} (name, email, password) VALUES ({$name}, {$email}, {$password})";

        return $this->conn->query($query);
    }
}
