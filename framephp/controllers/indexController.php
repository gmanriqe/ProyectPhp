<?php 

class indexController extends Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	
// 		if (isset($_SESSION['idusuario']))
// 			$this->_view->renderizar('index');
// 		else 
// 			$this->redireccionar('index/login');
		$this->_view->renderizar('index',true);
	}
	
	public function iniciasesion(){
		$this->_view->renderizar('login',true);
	}
	
	public function login(){
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$rol = $_POST['rol'];
		
		$objModel = $this->loadmodel('usuario');
		
		if($objModel -> validaUsuario($usuario,$clave,$rol)){
			if($_POST['rol'] == 'sa'){
				$this->redireccionar('index/sa');
			}else {
				$this->redireccionar('index/us');
			}
		}else {
			$this->_view->renderizar('index',true);
		}
	}
	
	public function sa(){
		$this->_view->renderizar('sa',true);
	}
	
	public function us(){
		$this->_view->renderizar('us',true);
	}
	
	public function signin(){
		$this->_view->renderizar('signin',true);
	}
// 	public function login(){
// 		$this->_view->renderizar('login',true);
		
// 	}
	
// 	public function valid(){
		
// 		//print_r($_POST);
		
// 		$idusuario = strtoupper(trim($_POST['idusuario']));
// 		$password = trim($_POST['password']);
		
// 		$objUser = $this->loadModel('user');
		
// 		if ( $objUser->exist($idusuario,$password)){
// 			$_SESSION['idusuario'] = $idusuario;
// 			$this->redireccionar('index/index');
// 		} 
// 		else {
// 			unset($_SESSION['idusuario']);
// 			$this->redireccionar('index/login');
// 		}
		
// 	}
	
// 	public function signup(){
// 		$idUser = trim($_POST['idUser']);
// 		$firstName = strtoupper(trim($_POST['firstName']));
// 		$lastName = strtoupper(trim($_POST['lastName']));
// 		$email = trim($_POST['email']);
// 		$password = $_POST['password'];
// 		$rpassword = $_POST['rpassword'];
		
// 		if ($password == $rpassword){
			
// 			$objUser = $this->loadModel('user');
			
// 			$objUser->useradd($idUser,$firstName,$lastName,$email,$password);
			
// 			$this->redireccionar('index/login');
	
// 		}
// 		else {
// 			$this->redireccionar('index/login');
			
// 		}
		
// 	}
	
// 	public function recovery(){
// 		$idUser = trim($_POST['idUser']);
// 		$new_pass = date("Y-m-d");
		
// 		$objUser = $this->loadModel('user');
// 		$email = $objUser->userUpdate($idUser,$new_pass);
// 		mail($email,"cambio de password", "Su nuevo password es $new_pass");
		
// 		$this->redireccionar('index/login');
// 	}
	
	
// 	public function logout(){
// 		if (isset($_SESSION['idusuario'])){
// 			unset($_SESSION['idusuario']);
// 		}
		
// 		$this->redireccionar('index/login');
// 	}
	
	
	
}


?>