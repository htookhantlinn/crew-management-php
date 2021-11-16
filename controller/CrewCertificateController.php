<?php

include_once('./model/crewcertificate.php');
class CrewCertificateController extends CrewCertificate
{
    public function add_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired, $sbook_no)
    {
       return $this->insert_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired, $sbook_no);
    }
}
