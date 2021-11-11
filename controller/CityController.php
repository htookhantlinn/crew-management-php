<?php

include_once('./model/city.php');
class CityController  extends City
{
    public function add_city($name)
    {
        return $this->insert_city($name);
    }
    public function show_all_city()
    {
        return $this->get_all_city();
    }

    public function get_city_by_id($city_id)
    {
        return $this->select_city_by_id($city_id);
    }

    public function delete_city($city_id)
    {
        return $this->delete_city_by_id($city_id);
    }
    public function update_city($cert_id,$city_name_update)
    {
        return $this->update_city_by_id($cert_id,$city_name_update);
    }
}
