<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Article
{
    private $conn;
    private $tableName = "articles";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($data): \PDOStatement|bool
    {
        $tableName = $this->tableName;
        $userId = $data['user_id'];
        $title = $data['title'];
        $content = $data['content'];
        $date = date("Y-m-d H:i");

        $query = "INSERT INTO {$tableName} (user_id, title, content, created_at) VALUES ({$userId}, '{$title}', '{$content}', '{$date}')";

        return $this->conn->query($query);
    }

    public function read(): \PDOStatement|bool
    {
        $tableName = $this->tableName;

        $query = "SELECT {$tableName}.*, users.name as author FROM {$tableName} JOIN users ON users.id = {$tableName}.user_id";

        return $this->conn->query($query);
    }

    public function readByUserId($userId): \PDOStatement|bool
    {
        $query = "SELECT * FROM {$this->tableName} WHERE user_id = {$userId}";

        return $this->conn->query($query);
    }

    public function getById($id)
    {
        $tableName = $this->tableName;

        $query = "SELECT {$tableName}.*, users.name as author FROM {$tableName} JOIN users ON users.id = {$tableName}.user_id WHERE {$tableName}.id = {$id}";

        $stmt = $this->conn->query($query);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data): \PDOStatement|bool
    {
        $tableName = $this->tableName;
        $title = $data['title'];
        $content = $data['content'];

        $query = "UPDATE {$tableName} SET title = '{$title}', content = '{$content}' WHERE id = {$id}";

        return $this->conn->query($query);
    }

    public function delete($id): \PDOStatement|bool
    {
        $tableName = $this->tableName;

        $query = "DELETE FROM {$tableName} WHERE id = {$id}";

        return $this->conn->query($query);
    }
}
