<?php
class productoModel extends Model {
	public function __construct() {
		parent::__construct ();
	}
	
	public function obtenerProductos(){
		$sql = "SELECT * FROM productos WHERE stock='si'";
		$result = $this->_db->query($sql) or die('Error '.$sql);
		return $result;
	}
	
	public function obteneTodosProductos(){
		$sql = "SELECT * FROM productos";
		$result = $this->_db->query($sql) or die('Error '.$sql);
		return $result;
	}
	
	public function obtenerProducto($codigoproducto=''){
		$sql = "SELECT * FROM productos WHERE codigoproducto = '$codigoproducto'";
		
		$result = $this->_db->query($sql) or die('Error: '.$sql);
		$reg = null;
		
		if($result-> num_rows){
			$reg = $result->fetch_object();
		}
		return $reg;
	}
	
	public function editar($codigoproducto,$nombre,$precio,$stock) {
		$sql = "UPDATE productos set nombre = '$nombre',
									 precio = $precio,
									 stock = '$stock'
				WHERE codigoproducto = '$codigoproducto'";
		$result = $this-> _db-> query($sql) or die ('Error: '.$sql);
		return $result;
	}
}
?>	















