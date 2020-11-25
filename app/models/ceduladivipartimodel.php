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
}
