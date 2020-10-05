<?php
/*
*	Clase para manejar la tabla clientes de la base de datos.
*/
class Clientes extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $id = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $nacimiento = null;
    private $direccion = null;
    private $estado = null;

    private $token_clave = null;


    // Métodos para asignar valores a los atributos.

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellido = $value;
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

    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setDireccion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
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

    //Métodos para obtener valores de los atributos.

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchClientes($value)
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, clave, direccion
                FROM cliente
                WHERE nombre ILIKE ? OR apellido ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createCliente()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente(nombre, apellido, correo, telefono, clave, direccion, fecha_nacimiento,  estado)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $hash, $this->direccion, $this->nacimiento, true);
        return Database::executeRow($sql, $params);
    }

    public function readAllClientes()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, direccion, estado
                FROM cliente ORDER BY id_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, direccion, fecha_nacimiento as nacimiento, estado
                FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateCliente()
    {
        $sql = 'UPDATE cliente
                    SET nombre = ?, apellido = ?, correo = ?, telefono = ?, direccion = ?,
                    estado= ?
                    WHERE id_cliente = ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->direccion, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteCliente()
    {
        $sql = 'DELETE FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readCompras()
    {
        $sql = 'SELECT id_factura, fc.fecha_registro, precio_total, estado_factura, nombre, apellido
        FROM factura fc INNER JOIN estado_factura ef USING(id_estado_factura) INNER JOIN cliente
        USING(id_cliente) WHERE id_cliente= ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function checkUser($email)
    {
        $sql = 'SELECT id_cliente, estado, nombre, apellido FROM cliente WHERE correo = ?';
        $params = array($email);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->estado = $data['estado'];
            $this->nombre = $data['nombre'];
            $this->apellido = $data['apellido'];
            $this->correo = $email;
            return true;
        } else {
            return false;
        }
    }

    //ARREGLAR
    public function checkPassword($password)
    {
        $sql = 'SELECT clave FROM cliente WHERE id_cliente = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente SET clave = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE cliente
                SET nombre = ?, apellido = ?, correo = ?, telefono = ?, direccion = ?, fecha_nacimiento = ?
                WHERE id_cliente = ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->direccion, $this->nacimiento, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function readActiveClients()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, direccion, estado FROM cliente WHERE estado = true ORDER BY id_cliente';
        return Database::getRows($sql, null);
    }

    public function monthlyClients()
    {
        $sql = "SELECT extract(month FROM fecha_registro) -1 AS Mes, count(id_cliente) AS cantidad FROM cliente WHERE extract(year FROM fecha_registro) = '2020' GROUP BY extract(month FROM fecha_registro) ORDER BY extract(month FROM fecha_registro)";
        return Database::getRows($sql, null);
    }

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
        $mail->addAddress($this->correo, $this->nombre . ' ' . $this->apellido);

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

    public function tokenClave($token)
    {
        $sql = "UPDATE cliente SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min' WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }

    public function verifyTokenClave()
    {
        $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo FROM cliente WHERE correo = ?";
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

    public function changePassword2()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente SET clave = ? WHERE correo = ?';
        $params = array($hash, $this->correo);
        return Database::executeRow($sql, $params);
    }

    public function deleteTokenClave()
    {
        $sql = "UPDATE cliente SET token_clave = null, vcto_token = null WHERE correo = ?";
        $params = array($this->correo);
        return Database::executeRow($sql, $params);
    }

    public function verifyTokenAuth($bool, $id)
    {
        if ($bool) {
            $sql = "UPDATE cliente SET auth_verificado = true WHERE id_cliente = ?";
            $params = array($id);
            Database::executeRow($sql, $params);

            $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo, auth_verificado FROM cliente WHERE id_cliente = ?";
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
    public function tokenAuth($token)
    {
        $sql = "UPDATE cliente SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min', auth_verificado = false WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }

    public function deleteTokenAuth($id)
    {
        $sql = "UPDATE cliente SET token_clave = null, vcto_token = null, auth_verificado = null WHERE id_cliente = ?";
        $params = array($id);
        return Database::executeRow($sql, $params);
    }
}
