<?php

include_once('db.php');

class CrewCertificate
{
    private $pdo;

    public function insert_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired): bool
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "insert into crew_certificate (crew_id, cert_id, date_issued, number, date_expired) 
        values (:crew_id, :cert_id, :date_issued, :number, :date_expired) ";


        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("crew_id", $crew_id);
        $statement->bindParam("cert_id", $cert_id);
        $statement->bindParam("date_issued", $date_issued);
        $statement->bindParam("number", $number);
        $statement->bindParam("date_expired", $date_expired);




        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }
    public function get_all_crew_cert()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql  = "SELECT * from crew as c JOIN vessel as v WHERE c.vessel_type=v.id;";
        $sql = "SELECT * from crew as c JOIN crew_certificate as c_crew JOIN certificate as cert WHERE c.id=c_crew.crew_id AND cert.id=c_crew.cert_id;";
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function get_crew_cert_by_certID_and_crewID($crewId, $certId)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql  = "SELECT * from crew as c JOIN vessel as v WHERE c.vessel_type=v.id;";
        $sql = "SELECT cc.id,cc.crew_id,cc.cert_id,cc.date_issued,cc.number,cc.date_expired,c.firstname,c.lastname,c.middlename,cert.name from crew_certificate as cc JOIN crew as c  JOIN certificate as cert  WHERE cc.crew_id= :crewId AND cc.cert_id=:certId AND cc.crew_id=c.id  AND cc.cert_id=cert.id;";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("crewId", $crewId);
        $statement->bindParam("certId", $certId);


        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
}
