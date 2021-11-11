<?php

include_once('./model/vessel.php');
class VesselController  extends Vessel
{
    public function add_vessel($name)
    {
        return $this->insert_vessel($name);
    }
    public function show_all_vessel()
    {
        return $this->get_all_vessel();
    }
    public function get_vessel_by_id($vessel_id)
    {
        return $this->select_vessel_by_id($vessel_id);
    }
    public function delete_vessel($vessel_id)
    {
        return $this->delete_vessel_by_id($vessel_id);
    }
    public function update_vessel($vessel_id,$vessel_name_update)
    {
        return $this->update_vessel_by_id($vessel_id,$vessel_name_update);
    }
}
