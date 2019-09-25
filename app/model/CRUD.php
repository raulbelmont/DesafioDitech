<?php
namespace App\model;

use App\model\ClassConnection;

abstract class CRUD extends ClassConnection
{

    protected $table;

    abstract public function insert();
    abstract public function update();

    public function select($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = Conecta::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id =:id";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
    }

}
