<?php 


class Patrimoniomodel extends Models{

    private $tablapatrimonio = "patrimonio";
    private $tablabien = "bien";
    private $tablatipobien = "tipobien";
    private $tablausuariobien = "usuariobien";
    private $tabladeuda = "deuda";
    private $tablatipodeuda = "tipodeuda";
    private $tablausuariodeuda = "usuariodeuda";

    public function listar($id){

        $query = $this->db->connect()->prepare('SELECT "Bien" AS clase, b.nombre AS "nombre", b.idbien AS "id", b.valorbien AS "valor", b.idtipobien, tb.nombre AS "tipo", b.idtipomoneda, b.idmodelo, p.patliquitotal, p.deudatotal, p.patbrutototal FROM '.$this->tablabien.' b JOIN '.$this->tablatipobien.' tb ON tb.idtipobien = b.idtipobien JOIN '.$this->tablausuariobien.' ub ON ub.idbien = b.idbien JOIN '.$this->tablapatrimonio.' p ON p.idpatrimonio = ub.idpatrimonio WHERE p.iddeclaracion = ? UNION SELECT "Deuda" AS clase, d.nombre AS "nombre", d.iddeuda AS "id", d.valordeuda AS "valor", d.idtipodeuda, td.nombre AS "tipo", d.idtipomoneda, d.idmodelo, p.patliquitotal, p.deudatotal, p.patbrutototal FROM '.$this->tabladeuda.' d JOIN '.$this->tablatipodeuda.' td ON td.idtipodeuda = d.idtipodeuda JOIN '.$this->tablausuariodeuda.' ud ON ud.iddeuda = d.iddeuda JOIN '.$this->tablapatrimonio.' p ON p.idpatrimonio = ud.idpatrimonio WHERE p.iddeclaracion = ?;');
        $query->execute([$id, $id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT idpatrimonio AS "id" FROM '.$this->tablapatrimonio.' WHERE iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function crear($iddeclaracion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablapatrimonio.'(patliquitotal, deudatotal, patbrutototal, iddeclaracion) VALUES (?,?,?,?)')) {

            $query->execute([0,0,0,$iddeclaracion]);

            
            return true;
        } else {

            return false;

        }

    }

    public function calcularpatrimoniototales($id){

        $bienes = $this->db->connect()->prepare('SELECT IF(SUM(b.valorbien) != 0,SUM(b.valorbien),0) AS "bien" FROM '.$this->tablapatrimonio.' p JOIN '.$this->tablausuariobien.' ub ON ub.idpatrimonio = p.idpatrimonio JOIN '.$this->tablabien.' b ON b.idbien = ub.idbien WHERE p.iddeclaracion = ?');
        $bienes->execute([$id]);
        $bienes = $bienes->fetch(PDO::FETCH_ASSOC);
        
        $deudas = $this->db->connect()->prepare('SELECT IF(SUM(d.valordeuda) != 0,SUM(d.valordeuda),0) AS "deuda" FROM '.$this->tablapatrimonio.' p JOIN '.$this->tablausuariodeuda.' ud ON ud.idpatrimonio = p.idpatrimonio JOIN '.$this->tabladeuda.' d ON d.iddeuda = ud.iddeuda WHERE p.iddeclaracion = ?');
        $deudas->execute([$id]);
        $deudas = $deudas->fetch(PDO::FETCH_ASSOC);

        $patrimoniototal = $bienes['bien'] - $deudas['deuda'];

        $patrimonio = $this->db->connect()->prepare('UPDATE '.$this->tablapatrimonio.' SET patliquitotal = ?, deudatotal = ?, patbrutototal = ? WHERE iddeclaracion  = ?');
        $patrimonio->execute([$patrimoniototal, $deudas['deuda'], $bienes['bien'], $id]);

    }

    public function consultarvalor($iddeclaracion){

        $patrimonio = $this->db->connect()->prepare('SELECT deudatotal, patbrutototal FROM '.$this->tablapatrimonio.' WHERE iddeclaracion = ?');
        $patrimonio->execute([$iddeclaracion]);
        $patrimonio = $patrimonio->fetch(PDO::FETCH_ASSOC);

        return $patrimonio;

    }

}


?>