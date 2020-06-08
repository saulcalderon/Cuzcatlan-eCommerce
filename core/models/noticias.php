<?php
/*
*	Clase para manejar la tabla noticias de la base de datos.
*/
class Noticias extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $titulo = null;
    private $contenido = null;
    private $imagen = null;
    private $archivo = null;
    private $fecha = null;
    private $categoria = null;
    private $estado = null;
    private $ruta = '../../../resources/img/productos/';

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

    public function setTitulo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->titulo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
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

    public function setIdValoracion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->valoracion = $value;
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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getRuta()
    {
        return $this->ruta;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchProductos($value)
    {
        /*$sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto, nombre_categoria, estado_producto
                FROM producto INNER JOIN categorias USING(id_categoria)
                WHERE nombre_producto ILIKE ? OR descripcion_producto ILIKE ?
                ORDER BY nombre_producto';*/
        $sql = 'SELECT id_noticia, titulo, contenido, imagen, fecha_registro, id_estado
                FROM noticias
                WHERE titulo ILIKE ? 
                ORDER BY id_noticia';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createProducto()
    {
        $sql = 'INSERT INTO noticias(titulo, contenido, imagen, fecha_registro,id_estado)
                    VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->titulo, $this->contenido, $this->imagen, $this->fecha, 1);
        return Database::executeRow($sql, $params);

        /*if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO productos(nombre_producto, descripcion_producto, precio_producto, imagen_producto, estado_producto, id_categoria)
                    VALUES(?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }*/
    }

    public function readAllProductos()
    {
        $sql = 'SELECT id_noticia, titulo, contenido, imagen, fecha_registro, id_estado 
        FROM noticias
        ORDER BY id_noticia';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->categoria);
        return Database::getRows($sql, $params);
    }

    public function readOneProducto()
    {
        $sql = 'SELECT id_producto, nombre, existencias, descripcion, precio_unitario, id_categoria_producto, id_estado_producto 
        FROM producto
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateProducto()
    {
        $sql = 'UPDATE producto
        SET nombre = ?, descripcion = ?, precio_unitario = ?, existencias = ?, id_estado_producto = ?, id_categoria_producto = ?
        WHERE id_producto = ?';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->estado, $this->categoria, $this->id);
        /*if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE producto
                    SET imagen_producto = ?, nombre = ?, descripcion = ?, precio_unitario = ?, id_estado_producto = ?, id_categoria_producto = ?
                    WHERE id_producto = ?';
            $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        } else {
            $sql = 'UPDATE producto
                    SET nombre = ?, descripcion = ?, precio_unitario = ?, id_estado_producto = ?, id_categoria_producto = ?
                    WHERE id_producto = ?';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        }*/
        return Database::executeRow($sql, $params);
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM producto
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readValoraciones()
    {
        $sql = 'SELECT id_valoracion, pr.nombre, pr.id_producto ,valoracion, comentario, cl.nombre AS cliente, id_estado AS estado FROM valoracion vl INNER JOIN cliente cl USING(id_cliente) 
        INNER JOIN producto pr USING(id_producto) WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function changeStatus()
    {
        $sql = 'UPDATE valoracion SET id_estado = ? WHERE id_valoracion = ?';
        $params = array($this->estado, $this->valoracion);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM producto INNER JOIN categorias USING(id_categoria)
                GROUP BY id_categoria, nombre_categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
