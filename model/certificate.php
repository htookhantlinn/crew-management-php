<?php
include_once('db.php');
class Certificate
{
    private $pdo;
    public function insert_certificate($name)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into certificate (name) values (:name) ";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("name", $name);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    public function get_all_certificate()
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from certificate";

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }

    public function select_certificate_by_id($cert_id)

    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "select * from certificate where id=:cert_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("cert_id", $cert_id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

        Database::disconnect();
    }
    public function delete_certificate_by_id($cert_id)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "delete  from certificate where id=:cert_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam("cert_id", $cert_id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function update_certificate_by_id($cert_id,$certificate_name_update)
    {
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE certificate SET name=:certificate_name_update WHERE id=:cert_id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam("cert_id", $cert_id);
        $statement->bindParam("certificate_name_update", $certificate_name_update);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }
}
