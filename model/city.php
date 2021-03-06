<?php
include_once('db.php');
class City
{
    private $pdo;
    public function insert_city($name)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into city (name) values (:name) ";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("name", $name);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

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

    public function select_city_by_id($city_id)

    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from city where id=:city_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("city_id", $city_id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
    public function delete_city_by_id($city_id)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "delete  from city where id=:city_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("city_id", $city_id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function update_city_by_id($city_id,$city_name_update)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE city SET name=:city_name_update WHERE id=:city_id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("city_id", $city_id);
        $statement->bindParam("city_name_update", $city_name_update);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }
}
