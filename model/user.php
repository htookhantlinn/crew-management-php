<?php
include_once "db.php";
class User
{
    private $username;
    private $password;
    private $pdo; /// for database

    public function getUser($username, $pwd)
    {
        //1.Database connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2.SQL statment
        $sql = "select * from user where username=:uname and password=:pwd";
        //3.prepare sql statment
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("uname", $username);
        $statement->bindParam("pwd", $pwd);
        //4.execute
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}



