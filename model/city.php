<?php
include_once('db.php');
class City
{

    private $pdo;

    public function get_all_city()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from city";

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function get_city_by_id($city_id)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from city where ID=:city_id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("city_id",$city_id);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
}
