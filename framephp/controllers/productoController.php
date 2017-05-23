<?php
class productoController extends Controller {
	public function __construct() {
		parent::__construct ();
	}
	
	public function index(){
		
	}
	//vista superadministrador luego de login
	public function sa(){
		$objModel = $this->loadModel('producto');
		$this->_view->productos = $objModel->obteneTodosProductos();
		$this->_view->renderizar('sa',true);
	}
	
	//vista usuario luego de login
	public function uslistaproductos(){
		$objModel = $this->loadModel('producto');
		$this->_view->productos = $objModel->obtenerProductos();
		$this->_view->renderizar('us',true);
	}
	
	//envio de un solo producto para editar
	public function formEditar($codigoproducto=''){
		$objModel = $this->loadModel('producto');
		$this->_view->dataProducto = $objModel->obtenerProducto($codigoproducto);
		$this->_view->renderizar('saedit',true);
	}
	
	//formulario editar
	public function editar(){
		$codigoproducto = trim($_POST['codigoproducto']);
		$nombre = trim($_POST['nombre']);
		$precio = trim($_POST['precio']);
		$stock = trim($_POST['stock']);
			
		$objModel = $this-> loadModel('producto');
		$objModel-> editar($codigoproducto,$nombre,$precio,$stock);
		$this-> redireccionar('producto/sa');
	}
	
}
?>
	