<?php

class Rentaexentamodel extends Models{

    private $tablarentaexenta = "rentaexenta";
    private $tablausuariorentaexenta = "usuariorentaexenta";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";
    private $tablaindemnizacion = "indemnizacion";
    private $tablagastosrepresentacion = "gastosrepresentacion";
    private $tablaprimacancilleria = "primacancilleria";
    private $tablaseguromuerte = "seguromuerte";
    private $tablafuerzapublica = "fuerzapublica";
    private $tablaexcesosalariobasico = "excesosalariobasico";
    private $tablacesantiaintereses = "cesantiaintereses";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexenta.'(rentaexentatotal) VALUES (?)')) {

            $query->execute([0]);

            $idrentaexenta = $connect->lastInsertId();

            return $idrentaexenta;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT re.idrentaexenta AS "id" FROM '.$this->tablarentaexenta.' re JOIN '.$this->tablausuariorentaexenta.' ure ON ure.idrentaexenta = re.idrentaexenta JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }


    public function calcularrentaexenta($id){

        $indemnizacion = $this->db->connect()->prepare('SELECT IF(SUM(i.valor) != 0,SUM(i.valor),0) AS "indemnizacion" FROM '.$this->tablaindemnizacion.' i WHERE i.idrentaexenta = ?');
        $indemnizacion->execute([$id]);
        $indemnizacion = $indemnizacion->fetch(PDO::FETCH_ASSOC);

        $gastosrepresentacion = $this->db->connect()->prepare('SELECT IF(SUM(gr.valor) != 0, SUM(gr.valor),0) AS "gastosrepresentacion" FROM '.$this->tablagastosrepresentacion.' gr WHERE gr.idrentaexenta = ?');
        $gastosrepresentacion->execute([$id]);
        $gastosrepresentacion = $gastosrepresentacion->fetch(PDO::FETCH_ASSOC);

        $primacancilleria = $this->db->connect()->prepare('SELECT IF(SUM(pc.valor) != 0, SUM(pc.valor),0) AS "primacancilleria" FROM '.$this->tablaprimacancilleria.' pc WHERE pc.idrentaexenta = ?');
        $primacancilleria->execute([$id]);
        $primacancilleria = $primacancilleria->fetch(PDO::FETCH_ASSOC);

        $cesantiaintereses = $this->db->connect()->prepare('SELECT IF(SUM(ci.valor) != 0, SUM(ci.valor),0) AS "cesantiaintereses" FROM '.$this->tablacesantiaintereses.' ci WHERE ci.idrentaexenta = ?');
        $cesantiaintereses->execute([$id]);
        $cesantiaintereses = $cesantiaintereses->fetch(PDO::FETCH_ASSOC);

        $seguromuerte = $this->db->connect()->prepare('SELECT IF(SUM(sm.valor) != 0, SUM(sm.valor),0) AS "seguromuerte" FROM '.$this->tablaseguromuerte.' sm JOIN '.$this->tablafuerzapublica.' fp ON fp.idfuerzapublica = sm.idfuerzapublica WHERE fp.idrentaexenta = ?');
        $seguromuerte->execute([$id]);
        $seguromuerte = $seguromuerte->fetch(PDO::FETCH_ASSOC);

        $excesosalariobasico = $this->db->connect()->prepare('SELECT IF(SUM(esb.valor) != 0, SUM(esb.valor),0) AS "excesosalariobasico" FROM '.$this->tablaexcesosalariobasico.' esb JOIN '.$this->tablafuerzapublica.' fp ON fp.idfuerzapublica = esb.idfuerzapublica WHERE fp.idrentaexenta = ?');
        $excesosalariobasico->execute([$id]);
        $excesosalariobasico = $excesosalariobasico->fetch(PDO::FETCH_ASSOC);

        $fuerzapublica = $seguromuerte['seguromuerte'] + $excesosalariobasico['excesosalariobasico'];

        $rentaexentatotal = $indemnizacion['indemnizacion'] + $gastosrepresentacion['gastosrepresentacion'] + $cesantiaintereses['cesantiaintereses'] + $primacancilleria['primacancilleria'] + $fuerzapublica;

        $ingresobruto = $this->db->connect()->prepare('UPDATE '.$this->tablarentaexenta.' SET rentaexentatotal = ? WHERE idrentaexenta  = ?');
        $ingresobruto->execute([$rentaexentatotal, $id]);

    }
}
?>