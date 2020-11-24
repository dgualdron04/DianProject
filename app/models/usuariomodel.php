<?php


class Usuariomodel extends Models
{
    private $tablausuario = "usuario";
    private $tablarol = "rol";
    private $tablaestado = "estadousuario";

    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $correo;
    private $telefono;
    private $codrol;
    private $nomrol;
    private $codestado;
    
    private $datos = array();



    public function __construct()
    {
        parent::__construct();

    }

    function registrarusuario($nombre, $apellido, $correo, $pass)
    {
        
        // Username doesnt exists, insert new account
            if ( $stmt = $this->db->connect()->prepare('INSERT INTO '.$this->tablausuario.' (nombre, apellido, correo, password, idrol, idestado) VALUES (?, ?, ?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->execute([$nombre, $apellido, $correo, $password, 4, 2]);
            /* echo 'You have successfully registered, you can now login!'; */
            return true;
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            /* echo 'Could not prepare statement!'; */
            return false;
        }
    }

    function userexist($correo)
    {
        if ($stmt = $this->db->connect()->prepare('SELECT correo, password FROM '.$this->tablausuario.' WHERE correo = :correo')) {
            // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
            $stmt->execute(['correo'=>$correo]);
            // Store the result so we can check if the account exists in the database.
            if ($stmt->rowCount() > 0) {
                // Username already exists
                /* echo 'Username exists, please choose another!'; */
                return true;
            } else {
                return false;
            }
            $stmt->close();
        }
    }

    function iniciarsesion($email, $pass)
    {

        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
            $stmt = $this->db->connect()->prepare('SELECT idusuario, password FROM '.$this->tablausuario.' WHERE correo = ?');
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->execute([$email]);
            // Store the result so we can check if the account exists in the database.
            if ($stmt->rowCount() > 0) {
                $consulta = $stmt->fetch();
                if (password_verify($pass, $consulta["password"])) {
                    return true;
                }else{
                    return false;
                }

            }

        
    }

    function usuarioactivo($email){

        $query = $this->db->connect()->prepare('SELECT eu.tipoestado as estado FROM usuario u JOIN estadousuario eu on eu.idestado = u.idestado WHERE u.correo = ?');
        $query->execute([$email]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        if (isset($query['estado'])) {
            if (strtolower($query['estado']) == 'activo') {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function setusuario($correo){

        $query = $this->db->connect()->prepare('SELECT * FROM '.$this->tablausuario.' WHERE correo = :correo');
        $query->execute(['correo' =>$correo]);

        foreach ($query as $currentUser) {
            $this->id = $currentUser['idusuario'];
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apellido'];
            $this->cedula = $currentUser['cedula'];
            $this->telefono = $currentUser['telefono'];
            $this->correo = $currentUser['correo'];
            $this->codrol = $currentUser['idrol'];
            $this->codestado = $currentUser['idestado'];
        }

        $query2= $this->db->connect()->prepare('SELECT * FROM '.$this->tablarol.' WHERE idrol = :codeRol');
        $query2->execute(['codeRol' => $this->codrol]);

        foreach ($query2 as $currentrol) {
            $this->nomrol = $currentrol['tiporol'];
            $_SESSION['Nombrerol'] = $currentrol['tiporol'];
        }

    }

    public function traerdatosusuario()
    {
        $this->datos['id'] = $this->getid();
        $this->datos['nombre'] = $this->getnombre();
        $this->datos['apellido'] = $this->getapellido();
        $this->datos['codrol'] = $this->getcodrol();
        $this->datos['nomrol'] = $this->getnomrol();
        $this->datos['correo'] = $this->getcorreo();
        $this->datos['cedula'] = $this->getcedula();
        $this->datos['telefono'] = $this->gettelefono();
        return $this->datos;
    }
    
    public function listar()
    {
        if (strtolower($this->nomrol) == "superadmin") {

            $query = $this->db->connect()->prepare('SELECT u.idusuario, u.nombre, u.apellido, u.cedula, u.telefono, u.correo, ru.tiporol as rol, eu.tipoestado as estado FROM usuario u JOIN '.$this->tablarol.' ru on ru.idrol = u.idrol JOIN estadousuario eu on eu.idestado = u.idestado WHERE ru.tiporol <> LOWER("SuperAdmin");');
            $query->execute();
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($myquery));

        } else if (strtolower($this->nomrol) == "coordinador") {

            $query = $this->db->connect()->prepare('SELECT u.idusuario, u.nombre, u.apellido, u.cedula, u.telefono, u.correo, ru.tiporol as rol, eu.tipoestado as estado FROM usuario u JOIN '.$this->tablarol.' ru on ru.idrol = u.idrol JOIN estadousuario eu on eu.idestado = u.idestado WHERE ru.tiporol <> LOWER("SuperAdmin") AND ru.tiporol <> LOWER("Coordinador") ;');
            $query->execute();
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($myquery));

        } else{

            return false;

        }
    }

    public function crearusuarios($nombre, $apellido, $cedula, $telefono,  $correo, $pass, $rol, $estado)
    {
        if ( $stmt = $this->db->connect()->prepare('INSERT INTO '.$this->tablausuario.' (nombre, apellido, cedula, telefono, correo, password, idrol, idestado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
            
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->execute([$nombre, $apellido, $cedula, $telefono ,$correo, $password, $rol, $estado]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function editarusuario($id){

        if (strtolower($this->nomrol) == "superadmin") {

            $query = $this->db->connect()->prepare('SELECT u.idusuario, u.nombre, u.apellido, u.password, u.cedula, u.telefono, u.correo, ru.tiporol as rol, eu.tipoestado as estado FROM usuario u JOIN '.$this->tablarol.' ru on ru.idrol = u.idrol JOIN estadousuario eu on eu.idestado = u.idestado WHERE ru.tiporol <> LOWER("SuperAdmin") AND u.idusuario = ? ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($myquery));

        } else if (strtolower($this->nomrol) == "coordinador") {
            
            $query = $this->db->connect()->prepare('SELECT u.idusuario, u.nombre, u.apellido, u.password, u.cedula, u.telefono, u.correo, ru.tiporol as rol, eu.tipoestado as estado FROM usuario u JOIN '.$this->tablarol.' ru on ru.idrol = u.idrol JOIN estadousuario eu on eu.idestado = u.idestado WHERE ru.tiporol <> LOWER("SuperAdmin") AND ru.tiporol <> LOWER("Coordinador") AND u.idusuario = ? ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($myquery));

        } else {

            return false;

        }

    }

    public function editarusuarios($nombre, $apellido, $cedula, $telefono,  $correo, $rol, $estado , $id)
    {
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablausuario.' SET nombre = ?, apellido = ?, cedula = ?, telefono = ?, correo = ?, idrol = ?, idestado = ? WHERE idusuario = ?')) {
            $stmt->execute([$nombre, $apellido, $cedula, $telefono ,$correo, $rol, $estado, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminarusuario($id)
    {
        if (strtolower($this->nomrol) == "superadmin") {
            
            if ( $stmt = $this->db->connect()->prepare('DELETE FROM usuario WHERE idusuario = ? AND idrol <> 1')) {
                
                $stmt->execute([$id]);
                
                return true;
            } else {
                
                return false;
            }

        } else if (strtolower($this->nomrol) == "coordinador") {
            
            if ( $stmt = $this->db->connect()->prepare('DELETE FROM usuario WHERE idusuario = ? AND idrol <> 1 AND idrol <> 2')) {
                
                $stmt->execute([$id]);
                
                return true;
            } else {
                
                return false;
            }

        }

        
    }

    public function editarperfil($nombre, $apellido, $cedula, $telefono, $id)
    {
        if ($query = $this->db->connect()->prepare('UPDATE '.$this->tablausuario.' SET nombre = ?, apellido = ?, cedula = ?, telefono = ? WHERE idusuario = ?')){
            
            $query->execute([$nombre, $apellido, $cedula, $telefono, $id]);

            return true;
            
        } else{

            return false;
        }
    }

    public function cambiarpass($passnuev, $id){

        if ($query = $this->db->connect()->prepare('UPDATE '.$this->tablausuario.' SET password = ? idusuario = ?')){
            
            $password = password_hash($passnuev, PASSWORD_DEFAULT);
            $query->execute([$password, $id]);

            return true;
            
        } else{

            return false;
            
        }

    }

    public function listarinformacionpersonal($id){
        $query = $this->db->connect()->prepare('SELECT ae.idactividadeconomica as "id", "Actividad economica" as "clase", tae.nombre FROM actividadeconomica ae JOIN tipoactividadeconomica tae ON tae.idtipoactividad = ae.idtipoactividad WHERE idusuario = ? UNION SELECT ds.iddireccionseccional as "id", "Direccion Seccional" as "clase", tds.nombre FROM direccionseccional ds JOIN tipodireccionseccional tds ON tds.idtipodireccionseccional = ds.idtipodireccionseccional WHERE ds.idusuario = ?');
        $query->execute([$id,$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    /* 
    Alerta, si se va a usar alguna de estas funciones toca cambiar el cod por id y el nombrerol por tiporol.

    public function obtenerusuarios()
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function obtenerusuariosyadmin()
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin");');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    } */

    /* public function obtenereliminarid($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function obtenereliminarcoordid($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    } */

    /* public function obtenereditid($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.password, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function obtenereditidadmin($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.password, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    } */

    public function obtenernumerorol($nombrerol)
    {

        $query = $this->db->connect()->prepare('SELECT idrol FROM '.$this->tablarol.' WHERE LOWER(tiporol) =  ?');
        $query->execute([$nombrerol]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery[0]['idrol'];
    }

    public function obtenernumeroestado($nombreestado)
    {

        $query = $this->db->connect()->prepare('SELECT idestado FROM '.$this->tablaestado.' WHERE LOWER(tipoestado) =  ?');
        $query->execute([$nombreestado]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery[0]['idestado'];
    }

    

    public function getid(){
        return $this->id;
    }

    public function getnombre(){
        return $this->nombre;
    }
    public function getapellido(){
        return $this->apellido;
    }
    public function getcorreo(){
        return $this->correo;
    }
    public function gettelefono(){
        return $this->telefono;
    }
    public function getcodrol(){
        return $this->codrol;
    }
    public function getcodestado(){
        return $this->codestado;
    }
    public function getnomrol(){
        return $this->nomrol;
    }
    public function getcedula(){
        return $this->cedula;
    }



}


?>