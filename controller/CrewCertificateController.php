<?php

include_once('./model/crewcertificate.php');
class CrewCertificateController extends CrewCertificate
{
   public function add_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired)
   {
      return $this->insert_crew_cert($crew_id, $cert_id, $date_issued, $number, $date_expired);
   }

   public function select_all_crew_cert()
   {
      return $this->get_all_crew_cert();
   }

   public function select_crew_cert_by_certID_and_crewID($crewId, $certId)
   {
      return $this->get_crew_cert_by_certID_and_crewID($crewId, $certId);
   }

   // SELECT * from crew as c JOIN crew_certificate as c_crew WHERE c.id=c_crew.crew_id;
   //SELECT * from crew as c JOIN crew_certificate as c_crew JOIN certificate as cert WHERE c.id=c_crew.crew_id AND cert.id=c_crew.cert_id;

   //  SELECT * from crew_certificate as cc JOIN crew as c   WHERE cc.crew_id= 55 AND cc.cert_id=1 AND cc.crew_id=c.id ;


}
