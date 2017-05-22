<?php 
Class usuarioModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	
	public function validaUsuario($idusuario,$clave,$rol){
		
		$sql ="select * from usuarios where idusuario='$idusuario' and clave=SHA1('$clave') and rol='$rol'";
		$result = $this->_db->query($sql) or die("Error : $sql");
		
		if ($result->num_rows) 
			return true;
		else 
			return false;
	}
	
// 	public function useradd($idUser,$firstName,$lastName,$email,$password){
// 		$sql =" insert into users set 
// 									idUser = '$idUser',
// 									firstName = '$firstName',
// 									lastName = '$lastName',
// 									email = '$email',
// 									password = SHA1('$password'),
// 									flag ='ACTIVE',
// 									fReg = NOW()
// 									";
// 		$result = $this->_db->query($sql) or die("Error : $sql");
		
// 		if ($this->_db->errno) return false;
// 		else 
// 			return true;
	
// 	}
	
}

?>