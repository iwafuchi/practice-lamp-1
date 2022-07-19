<?php

class DbConnection {
    private const DB_HOST = "mysql:dbname=testdb;host=mysql;charset=utf8mb4";
    private const DB_USER = "root";
    private const DB_PASS = "password";
    private const DRIVER_OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    private $pdo;
    public function __construct() {
        $this->pdo = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DRIVER_OPTIONS);
    }
    public function getConnection() {
        try {
            $pdo = $this->pdo;
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "接続成功";
            $sql1 = "SELECT * FROM member WHERE id = 1";
            $stmt = $pdo->query($sql1);
            echo "<pre>";
            print_r($stmt->fetchAll());
            echo "<pre>";
            $sql2 = "SELECT * FROM member WHERE id = :id";
            $stmt = $pdo->prepare($sql2);
            $stmt->bindValue(":id", 1, PDO::PARAM_INT);
            $stmt->execute();
            echo "<pre>";
            print_r($stmt->fetchAll());
            echo "<pre>";
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit("接続失敗" . $e->getMessage());
        }
    }
}

$dbConnection = new DbConnection();
$dbConnection->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBConnectionExample</title>
</head>

<body>

</body>

</html>