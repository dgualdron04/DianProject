<?php 


class Usuariobienmodel extends Models{

    private $tablausuariobien = "usuariobien";

    public function crear($idbien, $idpatrimonio, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariobien.'(idbien, idpatrimonio, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idbien, $idpatrimonio, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariobien.' WHERE idbien = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
    

}

?>