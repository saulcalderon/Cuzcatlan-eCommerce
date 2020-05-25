<?php
class Clientes extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $Id = null;
    private $Nombre = null;
    private $Apellido = null;
    private $Correo = null;
    private $Telefono = null;
    private $Clave = null;
    private $Fotografia = '../../../resources/img/clientes/';
    private $Direccion = null;
    private $Nacimiento =null;
    private $Registro = null;

    // Métodos para asignar valores a los atributos.

    public function setId($value){

        if($this ->validateNaturalNumber ($value))
           $this->id = $value;
          return true;
       } else {
        return false;
       }

    }

    public function setNombre($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFotografia($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setRegistro($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para obtener valores de los atributos.

    public function getId()
    {
        return $this->Id;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    public function getCorreo()
    {
        return $this->Correo;
    }

    public function getTelefono()
    {
        return $this->Telefono;
    }

    public function getClave()
    {
        return $this->Clave;
    }

    public function getFotografia()
    {
        return $this->Fotografia;
    }

    public function getDireccion()
    {
        return $this->Direccion;
    }

    public function getNacimiento()
    {
        return $this->Nacimiento;
    }

    public function getRegistro()
    {
        return $this->Registro;
    }

    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchCliente($value)
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, clave, fotografia, direccion, fecha_nacimiento, fecha_registro
                FROM cliente
                WHERE nombre ILIKE ? OR apellido ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createCliente()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO cliente(nombre, apellido, correo, telefono, clave, fotografia, direccion, fecha_nacimiento, fecha_registro)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->clave, $this->fotografia, $this->direccion, $this->fecha_nacimiento, $this->fecha_registro);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    public function readAllClientes()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, clave, fotografia, direccion, fecha_nacimiento, fecha_registro
                FROM cliente
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, clave, fotografia, direccion, fecha_nacimiento, fecha_registro
                FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        return Database::getRow($sql, $params);
    }

    public function updateCliente()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE cliente
                    SET nombre = ?, apellido = ?, correo = ?, telefono = ?, clave = ?, fotografia = ?, direccion = ?, fecha_nacimiento = ?, fecha_registro = ?
                    WHERE id_cliente = ?';
            $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->clave, $this->fotografia, $this->direccion, $this->fecha_nacimiento, $this->fecha_registro,  $this->id_cliente);
        } else {
            $sql = 'UPDATE cliente
                    SET nombre = ?, apellido = ?, correo = ?, telefono = ?, clave = ?, fotografia = ?, direccion = ?, fecha_nacimiento = ?, fecha_registro = ?
                    WHERE id_cliente = ?';
            $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->clave, $this->fotografia, $this->direccion, $this->fecha_nacimiento, $this->fecha_registro,  $this->id_cliente);
        }
        return Database::executeRow($sql, $params);
    }

    public function deleteCategoria()
    {
        $sql = 'DELETE FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        return Database::executeRow($sql, $params);
    }

}
?>