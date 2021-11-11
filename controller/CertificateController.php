<?php

include_once('./model/certificate.php');
class CertificateController  extends Certificate
{
    public function add_certificate($name)
    {
        return $this->insert_certificate($name);
    }
    public function show_all_certificate()
    {
        return $this->get_all_certificate();
    }
    public function get_certificate_by_id($cert_id)
    {
        return $this->select_certificate_by_id($cert_id);
    }
    public function delete_certificate($cert_id)
    {
        return $this->delete_certificate_by_id($cert_id);
    }
    public function update_certificate($cert_id,$certificate_name_update)
    {
        return $this->update_certificate_by_id($cert_id,$certificate_name_update);
    }
}
