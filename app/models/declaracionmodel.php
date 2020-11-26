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

    public function listarcedulas($id){
        $query = $this->db->connect()->prepare('SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Salario" as "aspecto", s.idsalario as "id", s.nombre as "nombre", s.valor as "valor" FROM salario s JOIN ingresobruto ib ON ib.idingresobruto = s.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Prestaciones sociales" as "aspecto", ps.idprestasociales as "id", ps.nombre as "nombre", ps.valor as "valor" FROM prestasociales ps JOIN ingresobruto ib ON ib.idingresobruto = ps.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Honorarios" as "aspecto", h.idhonorarios as "id", h.nombre as "nombre", h.valor as "valor" FROM honorarios h JOIN ingresobruto ib ON ib.idingresobruto = h.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Viaticos" as "aspecto", v.idviaticos as "id", v.nombre as "nombre", v.valor as "valor" FROM viaticos v JOIN ingresobruto ib ON ib.idingresobruto = v.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Otros pagos" as "aspecto", op.nombre as "nombre", op.idotrospagos as "id", op.valor as "valor" FROM otrospagos op JOIN ingresobruto ib ON ib.idingresobruto = op.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Cesantia Intereses" as "aspecto", ci.idcesantiasintereses as "id", ci.nombre as "nombre", ci.valor as "valor" FROM cesantiaintereses ci JOIN ingresobruto ib ON ib.idingresobruto = ci.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Obligatorios" as "aspecto", ao.idaporteobligatorio as "id", ao.nombre as "nombre", ao.valor as "valor" FROM aporteobligatorio ao JOIN ingresonoconse inc ON inc.idingresonoconse = ao.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Voluntarios" as "aspecto", av.idaportevoluntario as "id", av.nombre as "nombre", av.valor as "valor" FROM aportevoluntario av JOIN ingresonoconse inc ON inc.idingresonoconse = av.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Economicos Educativos" as "aspecto", aee.idaporteseconoedu as "id", aee.nombre as "nombre", aee.valor as "valor" FROM aporteseconoedu aee JOIN ingresonoconse inc ON inc.idingresonoconse = aee.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Pagos Alimentacion" as "aspecto", pa.idpagosalimen as "id", pa.nombre as "nombre", pa.valor as "valor" FROM pagosalimen pa JOIN ingresonoconse inc ON inc.idingresonoconse = pa.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Deducciones" as "aspecto", d.iddeducciones as "id", d.nombre as "nombre", d.valor as "valor" FROM deducciones d JOIN usuariodeducciones ud ON ud.iddeducciones = d.iddeducciones JOIN rentatrabajo rt ON rt.idrentatrabajo = ud.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Indemnizacion" as "aspecto", i.idindemnizacion as "id", i.nombre as "nombre", i.valor as "valor" FROM indemnizacion i JOIN rentaexenta re ON re.idrentaexenta = i.idrentaexenta JOIN usuariorentaexenta ure ON ure.idrentaexenta = re.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Prima cancilleria" as "aspecto", "Sin nombre" as "nombre", pc.idprimacancilleria as "id", pc.valor as "valor" FROM primacancilleria pc JOIN rentaexenta re ON re.idrentaexenta = pc.idrentaexenta JOIN usuariorentaexenta ure ON ure.idrentaexenta = re.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?
        UNION
        SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "seguromuerte" as "aspecto", "Sin nombre" as "nombre", sm.idseguromuerte as "id", sm.valor as "valor" FROM seguromuerte sm JOIN rentaexenta re ON re.idrentaexenta = sm.idfuerzapublica JOIN fuerzapublica fp ON fp.idfuerzapublica = sm.idfuerzapublica JOIN usuariorentaexenta ure ON ure.idrentaexenta = fp.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
            $query->execute([$id,$id,$id,$id,$id,$id,$id,$id,$id,$id,$id,$id,$id, $id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;
    }

    /*

SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Salario" as "aspecto", s.nombre as "nombre", s.valor as "valor" FROM salario s JOIN ingresobruto ib ON ib.idingresobruto = s.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Prestaciones sociales" as "aspecto", ps.nombre as "nombre", ps.valor as "valor" FROM prestasociales ps JOIN ingresobruto ib ON ib.idingresobruto = ps.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Honorarios" as "aspecto", h.nombre as "nombre", h.valor as "valor" FROM honorarios h JOIN ingresobruto ib ON ib.idingresobruto = h.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Viaticos" as "aspecto", v.nombre as "nombre", v.valor as "valor" FROM viaticos v JOIN ingresobruto ib ON ib.idingresobruto = v.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Otros pagos" as "aspecto", op.nombre as "nombre", op.valor as "valor" FROM otrospagos op JOIN ingresobruto ib ON ib.idingresobruto = op.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Cesantia Intereses" as "aspecto", ci.nombre as "nombre", ci.valor as "valor" FROM cesantiaintereses ci JOIN ingresobruto ib ON ib.idingresobruto = ci.idingresobruto JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Obligatorios" as "aspecto", ao.nombre as "nombre", ao.valor as "valor" FROM aporteobligatorio ao JOIN ingresonoconse inc ON inc.idingresonoconse = ao.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Voluntarios" as "aspecto", av.nombre as "nombre", av.valor as "valor" FROM aportevoluntario av JOIN ingresonoconse inc ON inc.idingresonoconse = av.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Aportes Economicos Educativos" as "aspecto", aee.nombre as "nombre", aee.valor as "valor" FROM aporteseconoedu aee JOIN ingresonoconse inc ON inc.idingresonoconse = aee.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Pagos Alimentacion" as "aspecto", pa.nombre as "nombre", pa.valor as "valor" FROM pagosalimen pa JOIN ingresonoconse inc ON inc.idingresonoconse = pa.idingresonoconse JOIN usuarioingresonoconse uinc ON uinc.idingresonoconse = inc.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinc.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Deducciones" as "aspecto", d.nombre as "nombre", d.valor as "valor" FROM deducciones d JOIN usuariodeducciones ud ON ud.iddeducciones = d.iddeducciones JOIN rentatrabajo rt ON rt.idrentatrabajo = ud.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Indemnizacion" as "aspecto", i.nombre as "nombre", i.valor as "valor" FROM indemnizacion i JOIN rentaexenta re ON re.idrentaexenta = i.idrentaexenta JOIN usuariorentaexenta ure ON ure.idrentaexenta = re.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "Prima cancilleria" as "aspecto", "Sin nombre" as "nombre", pc.valor as "valor" FROM primacancilleria pc JOIN rentaexenta re ON re.idrentaexenta = pc.idrentaexenta JOIN usuariorentaexenta ure ON ure.idrentaexenta = re.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1
UNION
SELECT "Cedula General" as "clase", "Renta trabajo" as "Tipo", "seguromuerte" as "aspecto", "Sin nombre" as "nombre", sm.valor as "valor" FROM seguromuerte sm JOIN rentaexenta re ON re.idrentaexenta = sm.idfuerzapublica JOIN fuerzapublica fp ON fp.idfuerzapublica = sm.idfuerzapublica JOIN usuariorentaexenta ure ON ure.idrentaexenta = fp.idrentaexenta JOIN rentatrabajo rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN cedulageneral cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = 1


*/

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