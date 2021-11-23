<?php

include_once('./model/service.php');
class ServiceController extends Service
{
    public  function  addService($crew_id,$company,$rank,$shipname,$vessel_id,$from_date,$to_date,$reason): bool
    {
        return $this->insertService($crew_id,$company,$rank,$shipname,$vessel_id,$from_date,$to_date,$reason);
    }

    public function select_all_service()
    {
        return $this->get_all_service();
    }
}
