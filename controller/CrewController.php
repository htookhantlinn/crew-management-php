<?php

include_once ('./model/crew.php');
class CrewController extends Crew{
    public  function  addCrew($person_name, $middle_name, $sur_name, $father_name, $mother_name, $nationality, $dob, $rank, $applied_velssel_type, $final_school, $martial_status, $net_waistline, $uniform_size, $blood_type, $safe_shoe, $health_inspection, $bank_info, $telephone_one, $telephone_two, $home_address, $city_select, $english_capability, $application_date, $passport_number, $passport_date, $passport_expired_date, $sbook_number, $sbook_date, $sbook_expired_date, $licensed_number, $License_date, $License_expired_date): bool
    {
        return $this->insertCrew($person_name, $middle_name, $sur_name, $father_name, $mother_name, $nationality, $dob, $rank, $applied_velssel_type, $final_school, $martial_status, $net_waistline, $uniform_size, $blood_type, $safe_shoe, $health_inspection, $bank_info, $telephone_one, $telephone_two, $home_address, $city_select, $english_capability, $application_date, $passport_number, $passport_date, $passport_expired_date, $sbook_number, $sbook_date, $sbook_expired_date, $licensed_number, $License_date, $License_expired_date);
    }
    
}