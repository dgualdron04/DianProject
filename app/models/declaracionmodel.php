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

    public function cambiarestadorevision($id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladeclaracion.' SET estadorevision = ? WHERE iddeclaracion = ?')) {
            $stmt->execute([1,$id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function denegarrevision($id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladeclaracion.' SET estadorevision = ? WHERE iddeclaracion = ?')) {
            $stmt->execute([0,$id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function cambiarestadoarchivo($id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladeclaracion.' SET estadoarchivo = ? WHERE iddeclaracion = ?')) {
            $stmt->execute([1,$id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function listarrevision(){
        
        $query = $this->db->connect()->prepare('SELECT p.annoperiodo, d.iddeclaracion, d.pagototal, d.estadoarchivo, d.estadorevision, d.estadodeclaracion, d.observaciones, u.nombre AS "nombre", u.apellido AS "apellido" FROM declaracion d JOIN usuario u ON u.idusuario = d.idusuario JOIN parametrosdeclaracion pd ON pd.iddeclaracion = d.iddeclaracion JOIN parametros p ON p.idparametro = pd.idparametro WHERE d.estadorevision = 1 AND d.estadoarchivo = 0;');
            $query->execute();
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

    }

}



?>