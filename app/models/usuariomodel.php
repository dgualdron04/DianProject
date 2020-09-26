<?php


class Usuariomodel extends Models
{
    private $tablausuario = "usuario";
    private $tablarol = "rolusuario";

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
            $stmt->execute([$nombre, $apellido, $correo, $password, 2, 1]);
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


}


?>