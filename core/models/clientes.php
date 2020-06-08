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
    private $direccion = null;
    private $estado = null;


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
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
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

        $sql = 'INSERT INTO cliente(nombre, apellido, correo, telefono, clave, direccion, id_estado)
                    VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->clave, $this->direccion, 1);
        return Database::executeRow($sql, $params);
    }

    public function readAllClientes()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, direccion, id_estado
                FROM cliente ORDER BY id_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, telefono, direccion, id_estado
                FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateCliente()
    {
        $sql = 'UPDATE cliente
                    SET nombre = ?, apellido = ?, correo = ?, telefono = ?, direccion = ?,
                    id_estado= ?
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
}
