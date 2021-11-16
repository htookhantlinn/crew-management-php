<?php

include_once('db.php');

class CrewCertificate
{
    private $pdo;

    public function insert_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired, $sbook_no): bool
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "insert into crew_certificate (crew_id, cert_id, date_issued, number, date_expired, sbook_no) 
        values (:crew_id, :cert_id, :date_issued, :number, :date_expired, :sbook_no) ";


        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("crew_id", $crew_id);
        $statement->bindParam("cert_id", $cert_id);
        $statement->bindParam("date_issued", $date_issued);
        $statement->bindParam("number", $number);
        $statement->bindParam("date_expired", $date_expired);
        $statement->bindParam("sbook_no", $sbook_no);
        



        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

  }
