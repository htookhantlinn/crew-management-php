<?php

include_once('db.php');

class Crew
{
    private $pdo;

    public function insertCrew($firstname, $middelname, $lastname, $father_name, $mother_name, $nationality, $birthdate, $rank, $vessel_type, $final_school, $martial_status, $waistline, $uniform_size, $blood_type, $safeshoe, $health_status, $bank_info, $tel1, $tel2, $address, $city, $english_level, $application_date, $passportno, $passportdate, $passportexpiredate, $sbookno, $sbookdate, $sbookexpire, $lincece, $licencedate, $licen_expire): bool
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "insert into crew (firstname,middlename,lastname,father_name,mother_name,nationality,birthdate,rank,vessel_type,final_school,martial_status,waistline,uniform_size,
        blood_type,safeshoe,health_status,bank_info,tel1,tel2,address,city,english_level,application_date,passportno,passportdate,
        passportexpiredate,sbookno,sbookdate,sbookexpire,lincece,licencedate,licen_expire) 
        values (:firstname,:middelname,:lastname,:father_name,:mother_name,:nationality,:birthdate,:rank,:vessel_type,:final_school,:martial_status,:waistline,:uniform_size,:blood_type,:safeshoe,:health_status,:bank_info,:tel1,:tel2,:address,:city,:english_level,:application_date,:passportno,:passportdate,:passportexpiredate,:sbookno,:sbookdate,:sbookexpire,:lincece,:licencedate,:licen_expire) ";


        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("firstname", $firstname);
        $statement->bindParam("middelname", $middelname);
        $statement->bindParam("lastname", $lastname);
        $statement->bindParam("father_name", $father_name);
        $statement->bindParam("mother_name", $mother_name);
        $statement->bindParam("nationality", $nationality);
        $statement->bindParam("birthdate", $birthdate);
        $statement->bindParam("rank", $rank);
        $statement->bindParam("vessel_type", $vessel_type);
        $statement->bindParam("final_school", $final_school);
        $statement->bindParam("martial_status", $martial_status);
        $statement->bindParam("waistline", $waistline);
        $statement->bindParam("uniform_size", $uniform_size);
        $statement->bindParam("blood_type", $blood_type);
        $statement->bindParam("safeshoe", $safeshoe);
        $statement->bindParam("health_status", $health_status);
        $statement->bindParam("bank_info", $bank_info);
        $statement->bindParam("tel1", $tel1);
        $statement->bindParam("tel2", $tel2);
        $statement->bindParam("address", $address);
        $statement->bindParam("city", $city);
        $statement->bindParam("english_level", $english_level);
        $statement->bindParam("application_date", $application_date);
        $statement->bindParam("passportno", $passportno);
        $statement->bindParam("passportdate", $passportdate);
        $statement->bindParam("passportexpiredate", $passportexpiredate);
        $statement->bindParam("sbookno", $sbookno);
        $statement->bindParam("sbookdate", $sbookdate);
        $statement->bindParam("sbookexpire", $sbookexpire);
        $statement->bindParam("lincece", $lincece);
        $statement->bindParam("licencedate", $licencedate);
        $statement->bindParam("licen_expire", $licen_expire);


        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    public function get_all_crew()

    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from crew";

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function get_crew_by_id($cid)

    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from crew where id=:cid";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("cid",$cid);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
}
