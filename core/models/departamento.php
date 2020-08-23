<?php
/*
*	Clase para manejar la tabla departamento de la base de datos.
*/
class Departamento extends Validator
{

    private $id_departamento = null;
    private $departamento = null;

    public function setIdDepartamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_departamento = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setDepartamento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdDepartamento()
    {
        return $this->id_departamento;
    }
    public function getDepartamento()
    {
        return $this->departamento;
    }



    public function readAll()
    {
        $sql = 'SELECT id_departamento, departamento FROM departamento';
        $params = null;
        return Database::getRows($sql, $params);
    }

    
}
