<?php
namespace App\model;

use App\model\ClassConnection;

abstract class ClassCRUD extends ClassConnection
{

    #As classes que estendem ClassCRUD iram definir a tabela do BD onde farão a pesquisa
    protected $table;

    abstract public function insert();
    abstract public function update();

    #metódo de busca genérico para todas as tabelas baseado no id
    public function select($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = ClassConnection::prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    #metodo de busca genérico que busca todos os registros de uma tabela
    public function selectAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = ClassConnection::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    #método de exclusão genérico pelo id do objeto
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id =:id";
        $stmt = ClassConnection::prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
    }

}
