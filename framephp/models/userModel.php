<?php 
Class userModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	
	public function exist($idusuario,$password){
		
		$sql ="select * from users where idUser='$idusuario' and password=SHA1('$password')";
		$result = $this->_db->query($sql) or die("Error : $sql");
		
		if ($result->num_rows) return true;
		else return false;
	}
	
	public function useradd($idUser,$firstName,$lastName,$email,$password){
		$sql =" insert into users set 
									idUser = '$idUser',
									firstName = '$firstName',
									lastName = '$lastName',
									email = '$email',
									password = SHA1('$password'),
									flag ='ACTIVE',
									fReg = NOW()
									";
		$result = $this->_db->query($sql) or die("Error : $sql");
		
		if ($this->_db->errno) return false;
		else 
			return true;
	
	}
	
}

?>