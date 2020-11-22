<?php 


class Declaracionmodel extends Models{

    private $tabladeclaracion = "declaracion";
    private $tablaparametrosdeclaracion = "parametrosdeclaracion";

    public function listar($id, $nomrol){

        if (strtolower($nomrol) == "declarante") {

            $query = $this->db->connect()->prepare('SELECT d.iddeclaracion, p.annoperiodo, d.pagototal, d.estadoarchivo, d.estadorevision, d.estadodeclaracion, d.observaciones FROM '.$this->tabladeclaracion.' d JOIN '.$this->tablaparametrosdeclaracion.' pd ON pd.iddeclaracion = d.iddeclaracion JOIN parametros p ON p.idparametro = pd.idparametro WHERE d.idusuario = ? ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

        } else if (strtolower($nomrol) == "contador") {
            
            $query = $this->db->connect()->prepare('SELECT d.iddeclaracion, d.pagototal, d.estadoarchivo, d.estadorevision, d.estadodeclaracion, d.observaciones FROM '.$this->tabladeclaracion.' d WHERE d.estadorevision = 1 ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

        } else {

            return false;

        }

    }

    public function crear($id){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladeclaracion.'(pagototal, estadoarchivo, estadorevision, estadodeclaracion, observaciones, idusuario) VALUES (?,?,?,?,?,?)')) {

            $query->execute([0,0,0,1," ",$id]);

            $iddeclaracion = $connect->lastInsertId();

            return $iddeclaracion;

        } else {

            return false;

        }

    }

}



?>