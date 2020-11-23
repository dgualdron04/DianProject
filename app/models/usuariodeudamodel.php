<?php 


class Usuariodeudamodel extends Models{

    private $tablausuariodeuda = "usuariodeuda";

    public function crear($iddeuda, $idpatrimonio, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariodeuda.'(iddeuda, idpatrimonio, idusuario) VALUES (?,?,?)')) {

            $query->execute([$iddeuda, $idpatrimonio, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariodeuda.' WHERE iddeuda = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>