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

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablacedulapensiones.'(rentaliquida, rentaliquidagravable, iddeclaracion) VALUES (?, ?, ?)')) {

            $query->execute([0, 0, $iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }

}

?>