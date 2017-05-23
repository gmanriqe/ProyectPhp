<?php 

class indexController extends Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->_view->renderizar('index',true);
	}
	
	public function iniciasesionsa(){
		$this->_view->renderizar('loginsa',true);
	}
	
	public function iniciasesionus(){
		$this->_view->renderizar('loginus',true);
	}
	
	public function login(){
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$rol = $_POST['rol'];
		
		$objModel = $this->loadmodel('usuario');
		
		if($objModel -> validaUsuario($usuario,$clave,$rol)){
			$_SESSION['usuario']= $usuario;
			if($_POST['rol'] == 'sa'){
				$this->redireccionar('producto/sa');
			}else {
				$this->redireccionar('producto/uslistaproductos');
			}
		}else {
			$this->_view->renderizar('index',true);
		}
	}
}
?>