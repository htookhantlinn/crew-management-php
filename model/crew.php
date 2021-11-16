<?php

include_once('db.php');

class Crew
{
    private $pdo;

    public function insertCrew($firstname, $middelname, $lastname, $father_name, $mother_name, $nationality, $birthdate, $rank, $vessel_type, $final_school, $martial_status, $waistline, $uniform_size, $blood_type, $safeshoe, $health_status, $bank_info, $tel1, $tel2, $address, $city, $english_level, $application_date, $passportno, $passportdate, $passportexpiredate, $sbookno, $sbookdate, $sbookexpire, $lincece, $licencedate, $licen_expire, $image): bool
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "insert into crew (firstname,middlename,lastname,father_name,mother_name,nationality,birthdate,rank,vessel_type,final_school,martial_status,waistline,uniform_size,
        blood_type,safeshoe,health_status,bank_info,tel1,tel2,address,city,english_level,application_date,passportno,passportdate,
        passportexpiredate,sbookno,sbookdate,sbookexpire,lincece,licencedate,licen_expire,image) 
        values (:firstname,:middelname,:lastname,:father_name,:mother_name,:nationality,:birthdate,:rank,:vessel_type,:final_school,:martial_status,:waistline,:uniform_size,:blood_type,:safeshoe,:health_status,:bank_info,:tel1,:tel2,:address,:city,:english_level,:application_date,:passportno,:passportdate,:passportexpiredate,:sbookno,:sbookdate,:sbookexpire,:lincece,:licencedate,:licen_expire,:image) ";


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
        $statement->bindParam("image", $image);



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

        //$sql  = "select * from crew where id =:cid";
        
        $sql  = "SELECT c.id,c.firstname,c.middlename,c.lastname,c.father_name,c.mother_name,c.nationality,c.birthdate,c.rank,c.vessel_type,c.final_school,c.martial_status,c.waistline,c.uniform_size,c.blood_type,c.safeshoe,c.health_status,c.bank_info,c.tel1,c.tel2,c.address,c.city,c.english_level,c.application_date,c.passportno,c.passportdate,c.passportexpiredate,c.sbookno,c.sbookdate,c.sbookexpire,c.lincece,c.licencedate,c.licen_expire,c.image,c.file_destination,v.name from crew as c JOIN vessel as v WHERE c.vessel_type=v.id AND c.id=:cid";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("cid", $cid);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function delete_crew_by_id($cid)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "delete  from crew where id=:cid";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("cid", $cid);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function update_crew_by_id(
        $cid,
        $firstname,
        $middle_name,
        $lastname,
        $father_name,
        $mother_name,
        $nationality,
        $rank,
        $vessel_type,
        $sbookno,
        $final_school,
        $martial_status,
        $net_waistline,
        $uniform_size,
        $blood_type,
        $safe_shoe,
        $health_inspection,
        $bank_info,
        $telephone_one,
        $telephone_two,
        $home_address,
        $city_select,
        $english_capability,
        $birth_date,
        $apply_date,
        $passport_number,
        $passport_date,
        $passport_expired_date,
        $sbook_date,
        $sbook_expired_date,
        $licensed_number,
        $License_date,
        $License_expired_date,
        $image
    ) {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE crew SET 
        firstname=:firstname,
        middlename=:middle_name,
        lastname=:lastname, 
        father_name=:father_name, 
        mother_name=:mother_name,
        nationality=:nationality, 
        rank=:rank, 
        vessel_type=:vessel_type, 
        sbookno=:sbookno, 
        final_school=:final_school, 
        martial_status=:martial_status,
        waistline=:net_waistline,
        uniform_size=:uniform_size,
        blood_type=:blood_type,
        safeshoe=:safe_shoe,
        health_status=:health_inspection,
        bank_info=:bank_info,
        tel1=:telephone_one,
        tel2=:telephone_two,
        address=:home_address,
        city=:city_select,
        english_level=:english_capability,
        birthdate=:birth_date,
        application_date=:apply_date,
        passportno=:passport_number,
        passportdate=:passport_date,
        passportexpiredate=:passport_expired_date,
        sbookdate=:sbook_date,
        sbookexpire=:sbook_expired_date,
        lincece=:licensed_number,
        licencedate=:License_date,
        licen_expire=:License_expired_date,
        image=:image  
        WHERE id=:cid";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("cid", $cid);
        $statement->bindParam("firstname", $firstname);
        $statement->bindParam("middle_name", $middle_name);
        $statement->bindParam("lastname", $lastname);
        $statement->bindParam("father_name", $father_name);
        $statement->bindParam("mother_name", $mother_name);
        $statement->bindParam("nationality", $nationality);
        $statement->bindParam("rank", $rank);
        $statement->bindParam("vessel_type", $vessel_type);
        $statement->bindParam("sbookno", $sbookno);
        $statement->bindParam("final_school", $final_school);
        $statement->bindParam("martial_status", $martial_status);
        $statement->bindParam("net_waistline", $net_waistline);
        $statement->bindParam("uniform_size", $uniform_size);
        $statement->bindParam("blood_type", $blood_type);
        $statement->bindParam("safe_shoe", $safe_shoe);
        $statement->bindParam("health_inspection", $health_inspection);
        $statement->bindParam("bank_info", $bank_info);
        $statement->bindParam("telephone_one", $telephone_one);
        $statement->bindParam("telephone_two", $telephone_two);
        $statement->bindParam("home_address", $home_address);
        $statement->bindParam("city_select", $city_select);
        $statement->bindParam("english_capability", $english_capability);
        $statement->bindParam("birth_date", $birth_date);
        $statement->bindParam("apply_date", $apply_date);
        $statement->bindParam("passport_number", $passport_number);
        $statement->bindParam("passport_date", $passport_date);
        $statement->bindParam("passport_expired_date", $passport_expired_date);
        $statement->bindParam("sbook_date", $sbook_date);
        $statement->bindParam("sbook_expired_date", $sbook_expired_date);
        $statement->bindParam("licensed_number", $licensed_number);
        $statement->bindParam("License_date", $License_date);
        $statement->bindParam("License_expired_date", $License_expired_date);
        $statement->bindParam("image", $image);


        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    //join two tables (crew and vessel ) table
    public function get_all_crew_join_table()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql  = "SELECT * from crew as c JOIN vessel as v WHERE c.vessel_type=v.id;";
        $sql = "SELECT c.id,c.firstname,c.middlename,c.lastname,c.father_name,c.mother_name,c.nationality,c.birthdate,c.rank,c.vessel_type,c.final_school,c.martial_status,c.waistline,c.uniform_size,c.blood_type,c.safeshoe,c.health_status,c.bank_info,c.tel1,c.tel2,c.address,c.city,c.english_level,c.application_date,c.passportno,c.passportdate,c.passportexpiredate,c.sbookno,c.sbookdate,c.sbookexpire,c.lincece,c.licencedate,c.licen_expire,c.image,c.file_destination,v.name from crew as c JOIN vessel as v WHERE c.vessel_type=v.id ";
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function get_id_by_sbookNo($sbookno)
    {

        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from crew where sbookno =:sbookno";
        
        // $sql  = "SELECT c.id,c.firstname,c.middlename,c.lastname,c.father_name,c.mother_name,c.nationality,c.birthdate,c.rank,c.vessel_type,c.final_school,c.martial_status,c.waistline,c.uniform_size,c.blood_type,c.safeshoe,c.health_status,c.bank_info,c.tel1,c.tel2,c.address,c.city,c.english_level,c.application_date,c.passportno,c.passportdate,c.passportexpiredate,c.sbookno,c.sbookdate,c.sbookexpire,c.lincece,c.licencedate,c.licen_expire,c.image,c.file_destination,v.name from crew as c JOIN vessel as v WHERE c.vessel_type=v.id AND c.id=:cid";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("sbookno", $sbookno);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
}
