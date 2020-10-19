<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $fechaNacimiento = null;
    private $idCargo = null;

    //Propiedades de las conexiones de los usuarios
    private $idConexion = null;
    private $ip = null;
    private $hostname = null;
    private $estadoConexion = null;

    //Tokens
    private $token_clave = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaNacimiento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->fechaNacimiento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCargo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCargo = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para guardar las conexiones conexión

    public function setIdConexion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idConexion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIp($value)
    {
        if ($this->ip = $value) {
            return true;
        } else {
            return false;
        }
    }

    public function setHostname($value)
    {
        if ($this->idConexion = $value) {
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoConexion($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estadoConexion = $value;
            return true;
        } else {
            return false;
        }
    }

    // Métodos para verificación de tokens

    public function setTokenClave($value)
    {
        if (strlen($value) == 13) {
            $this->token_clave = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getfechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    private function getTelefono()
    {
        return $this->telefono;
    }

    public function getidCargo()
    {
        return $this->idCargo;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getIdConexion()
    {
        return $this->idConexion;
    }

    public function gethostname()
    {
        return $this->hostname;
    }

    public function getEstadoConexion()
    {
        return $this->estadoConexion;
    }

    public function getIp()
    {
        return $this->ip;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkCorreo($correo)
    {
        $sql = 'SELECT id_administrador, nombre, apellido FROM administrador WHERE correo = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_administrador'];
            $this->nombres = $data['nombre'];
            $this->apellidos = $data['apellido'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT clave FROM administrador WHERE id_administrador = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }


    //Hacer una funcion para administrar los dispositivos (update) (Listo)
    public function updateDispositivo()
    {
        $estado = $this->estadoConexion;
        if ($estado == 1) {
            $estado = true;
        } else {
            $estado = false;
        }

        $host = $this->hostname;
        print_r($host);
        $sql = 'UPDATE conexiones SET estado = ? WHERE id_administrador = ? AND host = ?';
        $params = array($estado, $this->id, $host);
        print_r($params);
        return Database::executeRow($sql, $params);
    }
    //Funcion para ver todos los dispositivos (Read) (Listo)

    public function readAllDispositivos()
    {
        $sqlD = 'SELECT id_conexion, host, estado FROM conexiones WHERE id_administrador = ?';
        $paramsD = array($this->id);
        return Database::getRows($sqlD, $paramsD);
    }

    public function readOneDispositivo()
    {
        $sql = 'SELECT host, estado FROM conexiones WHERE id_administrador = ? AND id_conexion = ?';
        $params = array($this->id, $this->idConexion);
        return Database::getRow($sql, $params);
    }

    //Funcion para verificar si existen dispositivos, si no, agregar uno. Luego Evaluar si este dispositivo existe, 
    //que coincida con el nombre provisto anteriormente, si no, avisar que hay una sesión abierta. (Listo)

    public function checkDispositivo()
    {
        //Verificar si existen dispositivos antes 
        $sql = 'SELECT COUNT(*) FROM conexiones';
        $existen = Database::getRow($sql, null);
        //Si existen dispositivos se evalua que el del cliente coincida con el registrado a su ID
        if ($existen != 0) {

            $ipe = gethostbyname('localhost');
            $dispositivo = gethostname();

            $sql2 = 'SELECT ip, host, estado FROM conexiones WHERE id_administrador = ? AND ip = ? AND host = ? AND estado =?';
            $params2 = array($this->id, $ipe, $dispositivo, true);
            $data = Database::getRows($sql2, $params2);

            if ($data == true) {
                return true;
            } else {
                //Por cada estado se hará un update para tornarlo falso, luego se ejecutara la nueva consulta de arriba
                $sql3 = 'UPDATE conexiones SET estado = false WHERE id_administrador = ?';
                $params3 = array($this->id);
                $respuesta = Database::executeRow($sql3, $params3);
                if ($respuesta) {
                    //Actualizar la sesión actual a verdadero para logearse
                    $sql4 = 'UPDATE conexiones SET estado = true WHERE id_administrador = ? AND ip =? AND host = ? ';
                    $params4 = array($this->id, $ipe, $dispositivo);
                    $respuesta2 = Database::executeRow($sql4, $params4);

                    //Si no existe, se creará un registro de este dispositivo
                    if ($respuesta2) {
                        return true;
                    } else {
                        $sql5 = 'INSERT INTO conexiones(host, ip, estado, id_administrador) VALUES (?,?,?,?)';
                        $params5 = array($dispositivo, $ipe, true, $this->id);
                        $resultado = Database::executeRow($sql5, $params5);
                        if ($resultado) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    //Terminar
    public function insertDispositivo()
    {
        $sql = "INSERT INTO conexiones(host, ip, estado, id_administrador) VALUES(?,?,?,?)";
        $params = array(gethostname(), gethostbyname("localhost"), false, $this->id);
        $datos = Database::executeRow($sql, $params);
    }


    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE administrador SET clave = ? WHERE id_administrador = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE administrador
                SET nombre = ?, apellido = ?, correo = ?, telefono = ?
                WHERE id_administrador = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchUsuarios($value)
    {
        $sql = 'SELECT id_administrador, nombre, apellido, correo, telefono, id_cargo
                FROM administrador
                WHERE apellido ILIKE ? OR nombre ILIKE ?
                ORDER BY apellido';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createUsuario()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO administrador(nombre, apellido, correo, telefono, clave, id_cargo)
                VALUES(?, ?, ?, ?, ?,?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $hash, 1);
        return Database::executeRow($sql, $params);
    }

    public function readAllUsuarios()
    {
        $sql = 'SELECT id_administrador, nombre, apellido, correo, telefono, id_cargo
                FROM administrador
                ORDER BY apellido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneUsuario()
    {
        $sql = 'SELECT id_administrador, nombre, apellido, correo, telefono, id_cargo
                FROM administrador
                WHERE id_administrador = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateUsuario()
    {
        $sql = 'UPDATE administrador
                SET nombre = ?, apellido = ?, telefono = ?
                WHERE id_administrador = ?';
        $params = array($this->nombres, $this->apellidos, $this->telefono, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteUsuario()
    {
        $sql = 'DELETE FROM administrador
                WHERE id_administrador = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readTipoUser()
    {
        $sql = 'SELECT nombre, apellido, correo, telefono, cargo FROM administrador, cargo ORDER BY cargo';
        return Database::getRows($sql, null);
    }
    // Se agrega el token generado y su hora de vencimiento al administrador.
    public function tokenClave($token)
    {
        $sql = "UPDATE administrador SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min' WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se verifica el token generado y se comprueba si el token es correcto y si no ha expirado.
    public function verifyTokenClave()
    {
        $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo FROM administrador WHERE correo = ?";
        $params = array($this->correo);
        if ($data = Database::getRow($sql, $params)) {
            if ($data['token_clave'] == $this->token_clave && $data['tiempo']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // Se actualiza la contraseña.
    public function changePassword2()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE administrador SET clave = ? WHERE correo = ?';
        $params = array($hash, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se elimina el token y su hora de vencimiento de la base.
    public function deleteTokenClave()
    {
        $sql = "UPDATE administrador SET token_clave = null, vcto_token = null WHERE correo = ?";
        $params = array($this->correo);
        return Database::executeRow($sql, $params);
    }
    // Función para enviar un correo. Parametros : Cuerpo del correo, Asunto.
    public function sendMail($body, $subject)
    {
        require '../../../libraries/phpmailer52/class.phpmailer.php';
        require '../../../libraries/phpmailer52/class.smtp.php';

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

        $mail->SMTPSecure = 'ssl';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'kamiltik.thecoffeecup@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'Kamiltik12';

        //Set who the message is to be sent from
        $mail->setFrom('kamiltik.thecoffeecup@gmail.com', 'Kamiltik');

        //Set who the message is to be sent to
        $mail->addAddress($this->correo, $this->nombres . ' ' . $this->apellidos);

        //Set the subject line
        $mail->Subject = $subject;

        //Replace the plain text body with one created manually
        $mail->Body = $body;
        //send the message, check for error

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    // Se verifica el token generado y se comprueba si ha aceptado o denegado la sesión.
    public function verifyTokenAuth($bool, $id)
    {
        if ($bool) {
            $sql = "UPDATE administrador SET auth_verificado = true WHERE id_administrador = ?";
            $params = array($id);
            Database::executeRow($sql, $params);

            $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo, auth_verificado FROM administrador WHERE id_administrador = ?";
            $params = array($id);
            if ($data = Database::getRow($sql, $params)) {
                if ($data['token_clave'] == $this->token_clave && $data['tiempo'] && $data['auth_verificado']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // Se agrega el token generado y su hora de vencimiento al administrador.
    public function tokenAuth($token)
    {
        $sql = "UPDATE administrador SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min', auth_verificado = false WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se elimina el token y su hora de vencimiento de la base.
    public function deleteTokenAuth($id)
    {
        $sql = "UPDATE administrador SET token_clave = null, vcto_token = null, auth_verificado = null WHERE id_administrador = ?";
        $params = array($id);
        return Database::executeRow($sql, $params);
    }
}
