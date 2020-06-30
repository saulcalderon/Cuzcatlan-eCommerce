<?php

class Carrito extends Validator
{

    private $id_cliente = null;
    private $id_factura = null;
    private $id_estado = null;
    private $id_producto = null;
    private $cantidad = null;
    private $precio = null;
    private $id_detalle = null;



    // Métodos para asignar valores a los atributos
    public function setIdCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setIdFactura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle = $value;
            return true;
        } else {
            return false;
        }
    }
    // Métodos para obtener los valores
    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function getIdFactura()
    {
        return $this->id_factura;
    }
    public function getIdEstado()
    {
        return $this->id_estado;
    }

    // Métodos para diferentes operaciones

    public function readOneDetail()
    {
        $sql = 'SELECT id_detalle_factura, pd.nombre, df.cantidad, pd.precio_unitario  FROM detalle_factura df INNER JOIN factura fc USING(id_factura) INNER JOIN producto pd USING(id_producto) WHERE fc.id_factura= ?';
        $params = array($this->id_factura);
        return Database::getRows($sql, $params);
    }

    public function readBill()
    {
        $sql = 'SELECT id_factura FROM factura WHERE id_cliente = ? AND id_estado_factura = 1';
        $params = array($this->id_cliente);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_factura = $data['id_factura'];
            return true;
        } else {
            $sql = 'INSERT INTO factura (id_cliente)
            VALUES (?)';
            $params = array($this->id_cliente);
            if (Database::executeRow($sql, $params)) {
                $this->id_factura = Database::getLastRowId();
                return true;
            } else {
                return false;
            }
        }
    }
    public function readBill2()
    {
        $sql = 'SELECT id_factura FROM factura WHERE id_cliente = ? AND id_estado_factura = 1';
        $params = array($this->id_cliente);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_factura = $data['id_factura'];
            return true;
        } else {
            $sql = 'INSERT INTO factura (id_cliente)
            VALUES (?)';
            $params = array($this->id_cliente);
            if (Database::executeRow($sql, $params)) {
                $sql = 'SELECT id_factura FROM factura WHERE id_cliente = ? AND id_estado_factura = 1';
                $params = array($this->id_cliente);
                $data = Database::getRow($sql, $params);
                $this->id_factura = $data['id_factura'];
                return true;
            } else {
                return false;
            }
        }
    }

    public function createDetail()
    {
        $sql = 'INSERT INTO detalle_factura (cantidad, precio_unitario, id_factura, id_producto)
                VALUES (?, ?, ?, ?)';
        $params = array($this->cantidad, 6.00, $this->id_factura, $this->id_producto);
        return Database::executeRow($sql, $params);
    }

    public function deleteDetail()
    {
        $sql = 'DELETE from detalle_factura where id_detalle_factura = ?';
        $params = array($this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    public function updateDetail()
    {
        $sql = 'UPDATE detalle_factura
                SET cantidad = ?
                WHERE id_detalle_factura = ?';
        $params = array($this->cantidad, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    public function readOne(){
        $sql = 'SELECT id_detalle_factura, cantidad FROM detalle_factura 
        WHERE id_detalle_factura = ?';
        $params = array($this->id_detalle);
        return Database::getRow($sql,$params);
    }
}