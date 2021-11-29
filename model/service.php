<?php
include_once('db.php');
class Service
{
    private $pdo;
    public function insertService($crew_id, $company, $rank, $shipname, $vessel_id, $from_date, $to_date, $reason)
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

        // $sql  = "SELECT * from service as sv JOIN crew as c JOIN vessel as vs  where sv.crew_id = c.id AND sv.vessel_id=vs.id;";
        $sql = "SELECT sv.id,sv.crew_id,sv.company,sv.rank,sv.shipname,sv.vessel_id,sv.from_date,sv.to_date,sv.reason,c.firstname,c.middlename,c.lastname,
        vs.name from service as sv JOIN crew as c JOIN vessel as vs  where sv.crew_id = c.id AND sv.vessel_id=vs.id;";

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

    public function update_service_by_id($id, $company, $rank, $ship)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE service SET company=:company,rank=:rank,shipname=:ship WHERE id=:id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("id", $id);
        $statement->bindParam("company", $company);
        $statement->bindParam("rank", $rank);
        $statement->bindParam("ship", $ship);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }
}
