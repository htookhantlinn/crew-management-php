<?php
include_once('db.php');
class Service
{
    private $pdo;
    public function insertService($crew_id,$company,$rank,$shipname,$vessel_id,$from_date,$to_date,$reason)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into service (crew_id,company,rank,shipname,vessel_id,from_date,to_date,reason) values (:crew_id,:company,:rank,:shipname,:vessel_id,:from_date,:to_date,:reason) ";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("crew_id", $crew_id);
        $statement->bindParam("company", $company);
        $statement->bindParam("rank", $rank);
        $statement->bindParam("shipname", $shipname);
        $statement->bindParam("vessel_id", $vessel_id);
        $statement->bindParam("from_date", $from_date);
        $statement->bindParam("to_date", $to_date);
        $statement->bindParam("reason", $reason);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    public function get_all_service()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "SELECT * from service as sv JOIN crew as c JOIN vessel as vs  where sv.crew_id = c.id AND sv.vessel_id=vs.id;";

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
