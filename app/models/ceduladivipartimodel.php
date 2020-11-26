<?php

class Ceduladivipartimodel extends Models
{

    private $tablaceduladiviparti = "ceduladiviparti";

    public function crear($iddeclaracion)
    {

        if ($query = $this->db->connect()->prepare('INSERT INTO ' . $this->tablaceduladiviparti . '(rentaliquida, rentaexenta, iddeclaracion) VALUES (?, ?, ?)')) {

            $query->execute([0, 0, $iddeclaracion]);

            return true;
        } else {

            return false;
        }
    }


    public function traerid($id)
    {
        $query = $this->db->connect()->prepare('SELECT cd.idceduladiviparti AS "id" FROM '.$this->tablaceduladiviparti . ' cd WHERE cd.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function consultarvalor($iddeclaracion){

        $ceduladiviparti = $this->db->connect()->prepare('SELECT rentaliquida, rentaexenta FROM '.$this->tablaceduladiviparti.' WHERE iddeclaracion = ?');
        $ceduladiviparti->execute([$iddeclaracion]);
        $ceduladiviparti = $ceduladiviparti->fetch(PDO::FETCH_ASSOC);

        return $ceduladiviparti;

    }

}
