<?php

class Persona
{
    public $Id;
    public $Nombre;
    public $Apellido;
    public $NroDoc;
    public $Direccion;
    public $Email;

    public static function BuscarTodas()
    {
        $con = DataBase::getInstance();
        $sql = "select * from Personas";
        $queryPersonas = $con->db->prepare($sql);
        $queryPersonas->execute();
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        $ListPersonasDevolver = array();

        foreach ($queryPersonas as $p) {
            $ListPersonasDevolver[] = $p;
        }
        return $ListPersonasDevolver;
    }

    public static function Buscar($id)
    {
        $con = DataBase::getInstance();
        $sql = "select * from Personas where Id=:p1";
        $queryPersonas = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryPersonas->execute($params);
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        foreach ($queryPersonas as $p) {
            return $p;
        }
    }

    public function Agregar()
    {
        $con = DataBase::getInstance();
        $sql = "insert into Personas (Nombre,Apellido,NroDoc,Direccion,Email) values (:p1,:p2,:p3,:p4,:p5)";
        $queryPersonas = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDoc, "p4" => $this->Direccion, "p5" => $this->Email);
        $queryPersonas->execute($params);
    }

    public function Modificar()
    {
        $con = DataBase::getInstance();
        $sql = "UPDATE Personas SET
        Nombre = :p1,
        Apellido = :p2,
        NroDoc = :p3,
        Direccion = :p4,
        Email = :p5
        where id = :p6";
        $persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDoc, "p4" => $this->Direccion, "p5" => $this->Email, "p6" => $this->Id);
        $persona->execute($params);
    }

    public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "DELETE FROM Personas WHERE Id = :p1";
        $personaaeliminar = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $personaaeliminar->execute($params);
    }
}
