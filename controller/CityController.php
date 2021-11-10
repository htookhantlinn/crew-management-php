<?php

include_once('./model/city.php');

class CityController extends City
{
    public function show_all_city()
    {
        return $this->get_all_city();
    }

    public function show_city_info($city_id)
    {
        return $this->get_city_by_id($city_id);
    }
}
