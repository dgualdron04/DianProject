<?php

class Liquidacionprivadamodel extends Models{

    private $tablaliquidacionprivada = "liquidacionprivada";

    public function crear($iddeclaracion){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablaliquidacionprivada.'(impuestoneto, impuestooananciaso, impuestocargototal, anticiporentasiguiente, impuestototal, saldopagartotal, saldofavortotal, iddeclaracion ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {

            $query->execute([0, 0, 0, 0, 0, 0, 0, $iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }

}

?>