<?php
include_once('db.php');
class Vessel
{
    private $pdo;
    public function insert_vessel($name)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into vessel (name) values (:name) ";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("name", $name);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    public function get_all_vessel()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from vessel";

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    

    public function select_vessel_by_id($vessel_id)

    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from vessel where id=:vessel_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("vessel_id", $vessel_id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
    public function delete_vessel_by_id($vessel_id)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "delete  from vessel where id=:vessel_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("vessel_id", $vessel_id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function update_vessel_by_id($vessel_id, $vessel_name_update)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE vessel SET name=:vessel_name_update WHERE id=:vessel_id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("vessel_id", $vessel_id);
        $statement->bindParam("vessel_name_update", $vessel_name_update);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }
}
