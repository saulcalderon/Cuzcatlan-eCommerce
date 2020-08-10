<?php

class Mapa extends Validator
{

    private $id_departamento = null;
    private $producto = null;
    private $precio = null;
    private $proveedor = null;


    public function setIdDepartamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function readDepartment()
    {
        $sql = 'SELECT id_producto, nombre, existencias, precio_unitario, categoria_producto, nombre_empresa FROM producto INNER JOIN categoria_producto USING(id_categoria_producto)
        INNER JOIN proveedor USING(id_proveedor) INNER JOIN departamento USING(id_departamento)
        WHERE id_estado_producto = 1 AND id_departamento= ? ORDER BY nombre_empresa';
        $params = array($this->id_departamento);
        return Database::getRows($sql, $params);
    }
}
