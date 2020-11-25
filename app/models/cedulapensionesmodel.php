<?php

class Cedulapensionesmodel extends Models{

    private $tablacedulapensiones = "cedulapensiones";

    private $tipoingresopensiones = "tipoingresospensiones";
    private $tipoaporteobligatoriopensiones = "tipoaportesobligatoriospensiones";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tip.idtipoingresospensiones AS "id", tip.nombre, tip.descripcion, tip.ayuda, "Ingreso Bruto" AS "renta", "Tipo ingreso de pensiones" AS "tipoderenta" FROM '.$this->tipoingresopensiones.' tip
        UNION
        SELECT taopen.idtipoaportesobligatoriospensiones, taopen.nombre, taopen.descripcion, taopen.ayuda, "Ingresos no constitutivos" AS "renta", "Tipo de aporte obligatorio" AS "tipoderenta" FROM '.$this->tipoaporteobligatoriopensiones.' taopen');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($iddeclaracion){

        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacedulapensiones.'(rentaliquida, rentaliquidagravable, iddeclaracion) VALUES (?, ?, ?)')) {

            $query->execute([0, 0, $iddeclaracion]);

            $idcedulapensiones = $connect->lastInsertId();

            return $idcedulapensiones;

        } else {

            return false;

        }

    }

    public function traerid($id)
    {
        $query = $this->db->connect()->prepare('SELECT cp.idcedulapensiones AS "id" FROM '.$this->tablacedulapensiones . ' cp WHERE cp.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>