<?php
class Clientes extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $Id = null;
    private $Nombre = null;
    private $Empresa = null;
    private $Telefono = null;
    private $Departamento = null;

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

    public function setEmpresa($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->empresa = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->telefono = $value;
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
   
       public function getEmpresa()
       {
           return $this->Empresa;
       }
   
       public function getTelefono()
       {
           return $this->Telefono;
       }
   
       public function getDepartamento()
       {
           return $this->Departamento;
       }
       //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchProveedor($value)
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_empresa, telefono, id_departamento 
                FROM proveedor
                WHERE nombre_contacto ILIKE ? OR nombre_empresa ILIKE ?
                ORDER BY nombre_contacto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    public function createProveedor()
    {
        if{
            $sql = 'INSERT INTO cliente(nombre_contacto, nombre_empresa, telefono, id_departamento )
                    VALUES(?, ?, ?, ?)';
            $params = array($this->nombre, $this->empresa, $this->telefono, $this->departamento);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }
    public function readAllProveedores()
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_empresa, telefono, id_departamento
                FROM proveedor
                ORDER BY nombre_contacto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOnePorveedor()
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_proveedor, telefono, id_departamento 
                FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updatePorveedor()
    {
        if {
            $sql = 'UPDATE proveedor
                    SET nombre_contacto = ?, nombre_empresa = ?, teelfono= ?, id_departamento = ?
                    WHERE id_proveedor = ?';
            $params = array($this->nombre, $this->empresa, $this->telefono, $this->departamento);
        } else {
            $sql = 'UPDATE proveedor
                    SET nombre_contacto = ?, nombre_empresa = ?, telefono = ?, id_departamento = ?
                    WHERE id_proveedor = ?';
            $params = array($this->nombre, $this->empresa, $this->telefono, $this->departamento);
        }
        return Database::executeRow($sql, $params);
    }

    public function deleteProveedor()
    {
        $sql = 'DELETE FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::executeRow($sql, $params);
    }

}
?>



