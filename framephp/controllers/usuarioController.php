<?php 
class usuarioController extends Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	}
	
	//vista registro de usuario
	public function signin(){
		$this->_view->setJs(array('signin'));
		$this->_view->renderizar('signin',true);
	}
	
	//recepcion de datos de la creacion de usuario
	public function registerus(){
		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$clave1 = $_POST['clave1'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		
		$objModel = $this-> loadModel('usuario');
		$result = $objModel->saveUsuario($usuario,$nombre,$clave1,$email,$telefono);
		
		if($result) echo 'Error';
		else echo 'Ok';
	}
}
?>