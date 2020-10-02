<?php


class Usuariomodel extends Models
{
    private $tablausuario = "usuario";
    private $tablarol = "rolusuario";
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

    function register($nombre, $apellido, $correo, $pass)
    {
        
        // Username doesnt exists, insert new account
            if ( $stmt = $this->db->connect()->prepare('INSERT INTO '.$this->tablausuario.' (nombre, apellido, correo, password, codrol, codestadou) VALUES (?, ?, ?, ?, ?, ?)')) {
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

    function userexists($correo)
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

    function loginuser($email, $pass)
    {

        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
            $stmt = $this->db->connect()->prepare('SELECT codusuario, password FROM '.$this->tablausuario.' WHERE correo = ?');
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


    public function setUser($correo){

        $query = $this->db->connect()->prepare('SELECT * FROM '.$this->tablausuario.' WHERE correo = :correo');
        $query->execute(['correo' =>$correo]);

        foreach ($query as $currentUser) {
            $this->id = $currentUser['codusuario'];
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apellido'];
            $this->cedula = $currentUser['cedula'];
            $this->telefono = $currentUser['telefono'];
            $this->correo = $currentUser['correo'];
            $this->codrol = $currentUser['codrol'];
            $this->codestado = $currentUser['codestadou'];
        }

        $query2= $this->db->connect()->prepare('SELECT * FROM rolusuario WHERE codrol = :codeRol');
        $query2->execute(['codeRol' => $this->codrol]);

        foreach ($query2 as $currentrol) {
            $this->nomrol = $currentrol['nombrerol'];
            $_SESSION['Nombrerol'] = $currentrol['nombrerol'];
        }

    }

    public function traerdatosusuario()
    {
        $this->datos['nombre'] = $this->getnombre();
        $this->datos['apellido'] = $this->getapellido();
        $this->datos['codrol'] = $this->getcodrol();
        $this->datos['nomrol'] = $this->getnomrol();
        return $this->datos;
    }
    

    public function obtenerusuarios()
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function crearusuarios($nombre, $apellido, $cedula, $telefono,  $correo, $pass, $rol, $estado)
    {
        if ( $stmt = $this->db->connect()->prepare('INSERT INTO '.$this->tablausuario.' (nombre, apellido, cedula, telefono, correo, password, codrol, codestadou) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
            
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->execute([$nombre, $apellido, $cedula, $telefono ,$correo, $password, $rol, $estado]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function editarusuarios($nombre, $apellido, $cedula, $telefono,  $correo, $rol, $estado , $id)
    {
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablausuario.' SET nombre = ?, apellido = ?, cedula = ?, telefono = ?, correo = ?, codrol = ?, codestadou = ? WHERE codusuario = ?')) {
            $stmt->execute([$nombre, $apellido, $cedula, $telefono ,$correo, $rol, $estado, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function obtenereliminarid($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function eliminarusuario($id)
    {
        if ( $stmt = $this->db->connect()->prepare('DELETE FROM usuario WHERE codusuario = ?')) {
            $stmt->execute([$id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function obtenereditid($id)
    {
        $query = $this->db->connect()->prepare('SELECT u.codusuario, u.nombre, u.apellido, u.password, u.cedula, u.telefono, u.correo, ru.nombrerol as rol, eu.tipoestado as estado FROM usuario u JOIN rolusuario ru on ru.codrol = u.codrol JOIN estadousuario eu on eu.codestadou = u.codestadou WHERE ru.nombrerol <> LOWER("SuperAdmin") AND ru.nombrerol <> LOWER("Coordinador") AND u.codusuario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function obtenernumerorol($nombrerol)
    {

        $query = $this->db->connect()->prepare('SELECT codrol FROM '.$this->tablarol.' WHERE LOWER(nombrerol) =  ?');
        $query->execute([$nombrerol]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery[0]['codrol'];
    }

    public function obtenernumeroestado($nombreestado)
    {

        $query = $this->db->connect()->prepare('SELECT codestadou FROM '.$this->tablaestado.' WHERE LOWER(tipoestado) =  ?');
        $query->execute([$nombreestado]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery[0]['codestadou'];
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



}


?>